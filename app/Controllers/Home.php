<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{

    public function login()
    {
        return view('pages/login', [
            'pageTitle'=> 'Iniciar Sesión - Nike Corrientes',
        ]);
    }
    public function index()
    {
        return view('pages/home', [
            'pageTitle'=> 'Inicio - Nike Corrientes',
        ]);
    }
    public function about()
    {
        return view('pages/about', [
            'pageTitle'=> 'Nosotros - Nike Corrientes',
        ]);
    }
    public function comercialization()
    {
        return view('pages/comercialization', [
            'pageTitle'=> 'Comercialización - Nike Corrientes',
        ]);
    }
    public function terms_uses()
    {
        return view('pages/terms_uses', [
            'pageTitle'=> 'Términos y Condiciones - Nike Corrientes',
        ]);
    }
    public function contact()
    {
        return view('pages/contact', [
            'pageTitle'=> 'Contacto - Nike Corrientes',
        ]);
    }


    public function maintenance()
    {
        return view('pages/maintenance', [
            'pageTitle'=> 'Mantenimiento - Nike Corrientes',
        ]);
    }
}
