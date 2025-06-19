<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;
use App\Models\ProductosModel;
use App\Models\CategoriaModel;

class AdminController extends Controller
{
    public function stock(){

        if(!session () ->get('logged_in') || session()->get('user_rol' !== 'admin')){
            return redirect() -> to('/')->with('error', 'Acceso denegado.');
        } 
        
    }

    public function adminPage()
    {
        if(!session () ->get('logged_in') || session()->get('user_rol' !== 'admin')){
            return redirect() -> to('/')->with('error', 'Acceso denegado.');
        } else {
        return view('pages/Admin/adminPage', [
            'pageTitle' => 'Panel de gestión de administrador'
        ]);
        }
    }

    //función para administrar usuarios
    public function manageUsers()
    {
         if(!session()->get('logged_in') || session()->get('user_rol') !== 'admin'){
            return redirect()->to('/')->with('error', 'Acceso denegado.');
        }

        $usuariosModel = new UsuariosModel();
        $usuarios = $usuariosModel->findAll();

        return view('pages/Admin/manageUsers', [
            'pageTitle' => 'Panel de gestión de usuarios',
            'usuarios'  => $usuarios
        ]);
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
    if(!session()->get('logged_in') || session()->get('user_rol') !== 'admin'){
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
    if(!session()->get('logged_in') || session()->get('user_rol') !== 'admin'){
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
    if(!session()->get('logged_in') || session()->get('user_rol') !== 'admin'){
        return redirect()->to('/')->with('error', 'Acceso denegado.');
    }

    $productosModel = new \App\Models\ProductosModel();
    $productosModel->update($id_producto, ['activo' => 0]);

    return redirect()->to('/Admin/manageStock')->with('success', 'Producto desactivado correctamente.');
}
public function activateProduct($id_producto)
{
    if(!session()->get('logged_in') || session()->get('user_rol') !== 'admin'){
        return redirect()->to('/')->with('error', 'Acceso denegado.');
    }

    $productosModel = new \App\Models\ProductosModel();
    $productosModel->update($id_producto, ['activo' => 1]);

    return redirect()->to('/Admin/manageStock')->with('success', 'Producto activado correctamente.');
}

public function saveStock()
{
    if(!session()->get('logged_in') || session()->get('user_rol') !== 'admin'){
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
        if(!session()->get('logged_in') || session()->get('user_rol') !== 'admin'){
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
            'integer' => 'El talle debe ser un número.'
        ],
        'imagen' => [
            'max_size' => 'La imagen no puede exceder los 4MB.',
            'is_image' => 'El archivo seleccionado debe ser una imagen válida.'
        ]
        ]);
        
        if($validation->withRequest($request)->run()){
            $id = $request->getPost('id_producto');
            $data = [
            'nombre' => $request->getPost('nombre'),
            'id_categoria' => $request->getPost('id_categoria'),
            'descripcion' => $request->getPost('descripcion'),
            'precio' => $request->getPost('precio'),
            'cantidad' => $request->getPost('cantidad'),
            'sexo' => $request->getPost('sexo'),
            'talle' => $request->getPost('talle')
        ];
                $producto = new ProductosModel();
                $producto->update($id, $data);
                return redirect()->to('/Admin/manageStock')->with('success', 'Producto actualizado correctamente!');
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
}
