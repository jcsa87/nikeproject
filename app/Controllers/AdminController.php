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
    
    public function editStock($id_producto)
{
    if (!session()->get('logged_in') || session()->get('user_rol') !== 'admin') {
        return redirect()->to('/')->with('error', 'Acceso denegado.');
    }

    $productosModel = new \App\Models\ProductosModel();
    $categoriaModel = new \App\Models\CategoriaModel();

    $producto = $productosModel->find($id_producto);
    $categorias = $categoriaModel->findAll();

    if (!$producto) {
        return redirect()->to('/Admin/manageStock')->with('error', 'Producto no encontrado.');
    }

    if ($this->request->getMethod() === 'post') {
        $rules = [
            'nombre'      => 'required|max_length[100]',
            'descripcion' => 'required|max_length[255]',
            'id_categoria'=> 'required|is_natural_no_zero',
            'precio'      => 'required|decimal',
            'cantidad'    => 'required|integer',
            'sexo'        => 'required',
            'talle'       => 'required|numeric'
        ];

        $img = $this->request->getFile('imagen');
        if ($img && $img->isValid() && $img->getError() === UPLOAD_ERR_OK) {
            $rules['imagen'] = 'is_image[imagen]|max_size[imagen,4096]';
        }

        if (!$this->validate($rules)) {
            $producto = array_merge($producto, $this->request->getPost());
            return view('pages/Admin/editStock', [
                'producto' => $producto,
                'categorias' => $categorias,
                'errors' => $this->validator->getErrors()
            ]);
        }

        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_categoria'=> (int) $this->request->getPost('id_categoria'),
            'precio'      => (float) $this->request->getPost('precio'),
            'cantidad'    => (int) $this->request->getPost('cantidad'),
            'sexo'        => $this->request->getPost('sexo'),
            'talle'       => (float) $this->request->getPost('talle'),
            'activo'      => $producto['activo']
        ];

        // Si hay imagen nueva, la sube y la guarda
        if ($img && $img->isValid() && $img->getError() === UPLOAD_ERR_OK) {
            $imgName = $img->getRandomName();
            $img->move('assets/img', $imgName);
            $data['imagen'] = $imgName;
        }

        log_message('debug', 'Datos a actualizar: ' . json_encode($data));

        $result = $productosModel->update($id_producto, $data);

        log_message('debug', 'Resultado update: ' . json_encode($result));

        if (!$result) {
            log_message('error', 'Errores del modelo: ' . json_encode($productosModel->errors()));
            return view('pages/Admin/editStock', [
                'producto' => $producto,
                'categorias' => $categorias,
                'errors' => ['No se pudo actualizar el producto.']
            ]);
        }

        return redirect()->to('/Admin/manageStock')->with('success', 'Producto actualizado correctamente.');
    }

    return view('pages/Admin/editStock', [
        'producto' => $producto,
        'categorias' => $categorias,
        'errors' => []
    ]);
}
}
