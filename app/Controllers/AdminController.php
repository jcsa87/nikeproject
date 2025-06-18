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
        if(!session () ->get('logged_in') || session()->get('user_rol' !== 'admin')){
            return redirect() -> to('/')->with('error', 'Acceso denegado.');
        } else {
        return view('pages/Admin/manageUsers', [
            'pageTitle' => 'Panel de gestión de usuarios'
        ]);
        }
    }

    //función para administrarStock
    public function manageStock()
    {
        if(!session () ->get('logged_in') || session()->get('user_rol' !== 'admin')){
            return redirect() -> to('/')->with('error', 'Acceso denegado.');
        } else {
        return view('pages/Admin/manageStock', [
            'pageTitle' => 'Panel de gestión de stock'
        ]);
        }
    }
}
