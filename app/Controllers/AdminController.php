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

    //función para administrarStock
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
