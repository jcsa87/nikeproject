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

        $productos = $productosModel
            ->select('productos.*, categoria.nombre as categoria_nombre')
            ->join('categoria', 'categoria.id_categoria = productos.id_categoria')
            ->findAll();

        return view('pages/Admin/manageStock', [
            'pageTitle' => 'Panel de gestión de stock',
            'productos' => $productos
        ]);
    }
}
