<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function stock(){

        if(!session () ->get('logged_in') || session()->get('user_rol' !== 'admin')){
            return redirect() -> to('/')->with('error', 'Acceso denegado.');
        } 
        
    }

    public function adminPage()
    {
        return view('pages/Admin/adminPage', [
            'pageTitle' => 'Panel de gestión de administrador'
        ]);
    }

    //función para administrar usuarios
    public function manageUsers()
    {

        return view('pages/Admin/users');
    }

    //función para administrarStock
    public function manageStock()
    {
        // Lógica para gestión de usuarios
        return view('pages/Admin/users');
    }
}
