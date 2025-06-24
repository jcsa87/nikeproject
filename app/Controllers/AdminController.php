<?php
namespace App\Controllers;

use App\Models\DetalleFacturaModel;
use App\Models\FacturaModel;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;
use App\Models\ProductosModel;
use App\Models\CategoriaModel;
use App\Models\ConsultaModel;

class AdminController extends Controller
{
    //Método privado para verificar acceso admin
    private function checkAdmin()
    {
        return session()->get('logged_in') && strtolower(session()->get('user_rol')) === 'admin';
    }

    public function stock(){

        if (!$this->checkAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso denegado.');
        } 
        
    }

    public function adminPage()
{
    if (!$this->checkAdmin()) {
        return redirect()->to('/')->with('error', 'Acceso denegado.');
    }

    $usuariosModel = new UsuariosModel();
    $productosModel = new ProductosModel();
    $facturaModel = new FacturaModel();
    $detalleFacturaModel = new DetalleFacturaModel(); 
    $consultaModel = new ConsultaModel();

    $data = [
        'pageTitle' => 'Panel de gestión de administrador',
        'totalUsers' => $usuariosModel->where('activo', 1)->countAllResults(),
        'totalActiveProducts' => $productosModel->getTotalActiveProducts(),
        'totalProductsInStock' => $productosModel->getTotalProductsInStock(),

    ];

        // Para las ventas del mes actual
        $currentYear = date('Y');
        $currentMonth = date('m');
        $salesResult = null; 
        $salesResult = $facturaModel->selectSum('importe_total', 'total_sum') // Suma 'importe_total' y lo alias 'total_sum'
                                  ->where('YEAR(fecha_hora)', $currentYear)
                                  ->where('MONTH(fecha_hora)', $currentMonth)
                                  ->first();
        $data['monthlySales'] = ($salesResult && isset($salesResult['total_sum'])) ? (float)$salesResult['total_sum'] : 0.00;

        // Últimos pedidos (facturas) - ¡CORREGIDO: 'factura' en lugar de 'facturas'!
        $data['latestSales'] = $facturaModel->select('factura.*, usuarios.nombre as user_name, usuarios.apellido as user_lastname') // 'factura.*'
                                            ->join('usuarios', 'usuarios.id_usuario = factura.id_usuario') // 'factura.id_usuario'
                                            ->orderBy('fecha_hora', 'DESC')
                                            ->limit(3)
                                            ->findAll();
        
        // Consulta para 'Nuevas Consultas de Usuarios' (ya estaba correcto con 'consulta' singular)
        $data['latestConsultas'] = $consultaModel->select('consulta.*, usuarios.nombre as user_name, usuarios.apellido as user_lastname, usuarios.email as user_email')
                                                ->join('usuarios', 'usuarios.id_usuario = consulta.id_usuario', 'left') 
                                                ->orderBy('fecha_hora', 'DESC')
                                                ->limit(2)
                                                ->findAll();

        // Datos opcionales:
        $data['userGrowthPercentage'] = 'N/A';
        $data['salesTarget'] = 60000;

        // 3. Cargar la vista adminPage y pasar los datos
        return view('pages/Admin/adminPage', $data); 
    }

    //función para administrar usuarios
    public function manageUsers()
    {
        if (!$this->checkAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso denegado.');
        }

        $usuariosModel = new UsuariosModel();
        $usuarios = $usuariosModel->findAll();

        return view('pages/Admin/manageUsers', [
            'pageTitle' => 'Panel de gestión de usuarios',
            'usuarios'  => $usuarios
        ]);
    }

    public function editUser($id)
{
    $usuariosModel = new UsuariosModel();
    $usuario = $usuariosModel->find($id);

    if (!$usuario) {
        return redirect()->to('/Admin/manageUsers')->with('error', 'Usuario no encontrado.');
    }

    return view('pages/Admin/editUser', [
        'usuario' => $usuario
    ]);
}

public function updateUser($id)
{
    $usuariosModel = new UsuariosModel();
    $usuario = $usuariosModel->find($id);

    if (!$usuario) {
        return redirect()->to('/Admin/manageUsers')->with('error', 'Usuario no encontrado.');
    }

    $rules = [
        'nombre'   => 'required|alpha_space|min_length[2]',
        'apellido' => 'required|alpha_space|min_length[2]',
        'email'    => 'required|valid_email',
        'rol'      => 'required|in_list[admin,usuario]',
    ];

    if (!$this->validate($rules)) {
        return view('pages/Admin/editUser', [
            'usuario' => $usuario,
            'errors'  => $this->validator->getErrors()
        ]);
    }

    $data = [
        'nombre'   => $this->request->getPost('nombre'),
        'apellido' => $this->request->getPost('apellido'),
        'email'    => $this->request->getPost('email'),
        'rol'      => $this->request->getPost('rol'),
        'telefono' => $this->request->getPost('telefono'),
        'direccion'=> $this->request->getPost('direccion'),
    ];

    // Si se ingresó una nueva contraseña, actualizarla
    $password = $this->request->getPost('password');
    if ($password) {
        $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $usuariosModel->update($id, $data);

    return redirect()->to('/Admin/manageUsers')->with('success', 'Usuario actualizado correctamente.');
}

public function deactivateUser($id)
{
    $usuariosModel = new UsuariosModel();
    $usuariosModel->update($id, ['activo' => 0]);
    return redirect()->to('/Admin/manageUsers')->with('success', 'Usuario desactivado.');
}

public function activateUser($id)
{
    $usuariosModel = new UsuariosModel();
    $usuariosModel->update($id, ['activo' => 1]);
    return redirect()->to('/Admin/manageUsers')->with('success', 'Usuario activado.');
}

    public function addUser()
{
    if ($this->request->getMethod() === 'post') {
        $rules = [
        'nombre' => 'required|alpha_space|min_length[2]',
        'apellido' => 'required|alpha_space|min_length[2]',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'email_confirm' => 'required|matches[email]',
        'telefono' => 'permit_empty|regex_match[/^[0-9]{6,15}$/]',
        'password' => [
            'label' => 'Contraseña',
            'rules' => 'required|min_length[8]|max_length[30]|regex_match[/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])/]',
            'errors' => [
                'regex_match' => 'La contraseña debe tener al menos una mayúscula, una minúscula y un número.',
            ]
        ],
        'password_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return view('pages/Admin/addUser', [
                'errors' => $this->validator->getErrors()
            ]);
        }

        $userModel = new UsuariosModel();
        $userModel ->insert([
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'direccion' => $this->request->getPost('direccion'),
            'email' => $this->request->getPost('email'),
            'password_hash'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'telefono'      => $this->request->getPost('telefono'),
            'rol'      => 'usuario',
            'activo'   => 1,
        ]);
    
     return redirect()->to('/Admin/manageUsers')->with('success', 'Usuario agregado correctamente.');
    } 
    
    return view('pages/Admin/addUser');
}


//categoría
    public function addCategory()
{
    if ($this->request->getMethod() === 'post') {
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
        ];

        if (!$this->validate($rules)) {
            return view('pages/Admin/addCategory', [
                'errors' => $this->validator->getErrors()
            ]);
        }

        $categoriaModel = new \App\Models\CategoriaModel();
        $categoriaModel->insert([
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'activo' => 1
        ]);

        return redirect()->to('/Admin/manageCategories')->with('success', 'Categoría agregada correctamente.');
    }

    // Si es GET, muestra el formulario
    return view('pages/Admin/addCategory');
}

public function saveCategory()
{
    if (!$this->checkAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso denegado.');
        }

    $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $categoriaModel = new \App\Models\CategoriaModel();
    $categoriaModel->insert([
        'nombre' => $this->request->getPost('nombre'),
        'descripcion' => $this->request->getPost('descripcion'),
        'activo' => 1
    ]);

    return redirect()->to('/Admin/manageStock')->with('success', 'Categoría agregada correctamente.');
}


    //stock
    public function addStock()
{
    if (!$this->checkAdmin()) {
        return redirect()->to('/')->with('error', 'Acceso denegado.');
        }

    $categoriaModel = new \App\Models\CategoriaModel();
    $categorias = $categoriaModel->where('activo', 1)->findAll();

    return view('pages/Admin/addStock', [
        'categorias' => $categorias
    ]);
}

public function deleteProduct($id_producto)
{
    if (!$this->checkAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso denegado.');
        }

    $productosModel = new \App\Models\ProductosModel();
    $productosModel->update($id_producto, ['activo' => 0]);

    return redirect()->to('/Admin/manageStock')->with('success', 'Producto desactivado correctamente.');
}
public function activateProduct($id_producto)
{
    if (!$this->checkAdmin()) {
        return redirect()->to('/')->with('error', 'Acceso denegado.');
        }

    $productosModel = new \App\Models\ProductosModel();
    $productosModel->update($id_producto, ['activo' => 1]);

    return redirect()->to('/Admin/manageStock')->with('success', 'Producto activado correctamente.');
}

public function saveStock()
{
    if (!$this->checkAdmin()) {
        return redirect()->to('/')->with('error', 'Acceso denegado.');
        }

    $validation = \Config\Services::validation();
    $rules = [
        'nombre'      => 'required',
        'id_categoria'=> 'required|is_natural_no_zero',
        'descripcion' => 'required',
        'precio'      => 'required|decimal',
        'cantidad'    => 'required|integer',
        'sexo'        => 'required',
        'talle'       => 'required',
        'imagen'      => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Subir imagen
    $img = $this->request->getFile('imagen');
    $imgName = $img->getRandomName();
    $img->move('assets/img', $imgName);

    $productoData = [
        'nombre'      => $this->request->getPost('nombre'),
        'id_categoria'=> $this->request->getPost('id_categoria'),
        'descripcion' => $this->request->getPost('descripcion'),
        'precio'      => $this->request->getPost('precio'),
        'cantidad'    => $this->request->getPost('cantidad'),
        'sexo'        => $this->request->getPost('sexo'),
        'talle'       => $this->request->getPost('talle'),
        'activo'      => 1,
        'imagen'      => $imgName
    ];

    $productosModel = new \App\Models\ProductosModel();
    $productosModel->insert($productoData);

    return redirect()->to('/Admin/manageStock')->with('success', 'Producto agregado correctamente.');
}
    public function manageStock()
    {
        if (!$this->checkAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso denegado.');
        }

        $productosModel = new ProductosModel();
        $categoriaModel = new CategoriaModel();

        $categorias = $categoriaModel->findAll();

        $productos = $productosModel
            ->select('productos.*, categoria.nombre as categoria_nombre')
            ->join('categoria', 'categoria.id_categoria = productos.id_categoria')
            ->findAll();

        return view('pages/Admin/manageStock', [
            'pageTitle' => 'Panel de gestión de stock',
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }
    
    public function editar_producto($id=null){
        $producto = new ProductosModel();
        $categoria = new CategoriaModel();
        $data['categorias'] = $categoria->findAll();
        $data['producto'] = $producto->where('id_producto', $id)->first();
        $data['titulo'] = 'Editar Producto';

        return view('pages/Admin/editStock', $data);
    
    }

    public function actualizar_producto(){
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre' => 'required|max_length[50]',
            'descripcion' => 'required|max_length[300]',
            'id_categoria' => 'required|is_not_unique[categoria.id_categoria]',
            'precio' => 'required|decimal',
            'cantidad' => 'required|integer',
            'sexo' => 'required',
            'talle' => 'required|decimal',
            'imagen' => 'max_size[imagen,4096]|is_image[imagen]'
        ],
        [   //Errors
            'nombre' => [
            'required' => 'El nombre del producto es obligatorio.',
            'max_length' => 'El nombre no puede exceder los 50 caracteres.'
        ],
        'descripcion' => [
            'required' => 'La descripción del producto es obligatoria.',
            'max_length' => 'La descripción no puede exceder los 300 caracteres.'
        ],
        'id_categoria' => [
            'required' => 'La categoría del producto es obligatoria.',
            'is_not_unique' => 'La categoría seleccionada no existe.'
        ],
        'precio' => [
            'required' => 'El precio del producto es obligatorio.',
            'decimal' => 'El precio debe ser un número decimal válido.'
        ],
        'cantidad' => [
            'required' => 'La cantidad del producto es obligatoria.',
            'integer' => 'La cantidad debe ser un número entero.'
        ],
        'sexo' => [
            'required' => 'El sexo es obligatorio.'
        ],
        'talle' => [
            'required' => 'El talle es obligatorio.',
            'float' => 'El talle debe ser un número.'
        ],
        'imagen' => [
            'max_size' => 'La imagen no puede exceder los 4MB.',
            'is_image' => 'El archivo seleccionado debe ser una imagen válida.'
        ]
        ]);
        
        if($validation->withRequest($request)->run()){
            $id = $request->getPost('id_producto');
            $productoModel = new ProductosModel();
            $productoActual = $productoModel->where('id_producto', $id)->first();
            $data = [
            'nombre' => $request->getPost('nombre'),
            'id_categoria' => $request->getPost('id_categoria'),
            'descripcion' => $request->getPost('descripcion'),
            'precio' => $request->getPost('precio'),
            'cantidad' => $request->getPost('cantidad'),
            'sexo' => $request->getPost('sexo'),
            'talle' => $request->getPost('talle')
        ];

        $img = $request->getFile('imagen');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imgName = $img->getRandomName();
            $img->move('assets/img', $imgName);
            $data['imagen'] = $imgName;
        } else {
            // Mantener la imagen anterior si no se subió una nueva
            $data['imagen'] = $productoActual['imagen'];
        }
                $producto = new ProductosModel();
                $producto->update($id, $data);
                return redirect()->to('/Admin/manageStock')->with('success', '¡Producto actualizado correctamente!');
    }else {           
            $validationErrors = $validation->getErrors();
            $productoModel = new ProductosModel();
            $categoriaModel = new CategoriaModel();
            $data['errors'] = $validationErrors;
            $data['producto'] = $productoModel->where('id_producto', $request->getPost('id_producto'))->first();
            $data['categorias'] = $categoriaModel->findAll();
            $data['titulo'] = 'Editar Producto';
            return view('pages/Admin/editStock', $data);
        }
    }

    public function consultarVentas()
    {
        $facturaModel = new FacturaModel();
        $detalleModel = new DetalleFacturaModel();
        $usuarioModel = new UsuariosModel();

        // Trae todas las facturas con usuario
        $facturas = $facturaModel->orderBy('fecha_hora', 'DESC')->findAll();

        // Opcional: Traer detalles de cada factura
        foreach ($facturas as &$factura) {
        $factura['usuario'] = $usuarioModel->find($factura['id_usuario']);
        $factura['detalles'] = $detalleModel->where('id_factura', $factura['id_factura'])->findAll();
        }

        return view('pages/Admin/consultarVentas', [
            'facturas' => $facturas
            ]);
        }
}
