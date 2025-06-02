<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UsuariosModel;

class Home extends Controller
{

    public function login()
    {
        $mensaje = session('mensaje');
        return view('pages/login',["mensaje" => $mensaje], [
            'pageTitle'=> 'Iniciar Sesión - Nike Corrientes',
        ]);
    }

    public function loginPost()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $Usuario = new UsuariosModel();

        $datosUsuario =  $Usuario->obtenerUsuarioPorEmail($email);
        var_dump($datosUsuario); exit;

        
       if($datosUsuario && password_verify($password, $datosUsuario['password'])) {
                

                $data = [
                    "usuario" =>$datosUsuario['email'],
                    "rol" =>$datosUsuario['rol'],
                ];

                //instanciamos una sesión con php
                $session = session();
                $session->set($data);

                return redirect()->to(base_url('/')) ->with('mensaje','1');

            } else {
                return redirect()->to(base_url('/')) ->with('mensaje','0');

            }
    }

    // manejamos el post del registro
    public function register()
    {
        helper(['form']);

        if($this ->request -> getMethod() === 'post'){
            $userModel = new UsuariosModel();
            
            $data = [
                'nombre' => $this -> request -> getPost('nombre'),
                'apellido' => $this -> request -> getPost('apellido'),
                'email' => $this -> request -> getPost('email'),
                'direccion' => $this -> request -> getPost('direccion'),
                'password' => $this -> request -> getPost('password'),
                'telefono' => $this -> request -> getPost('telefono'),

            ];

            $userModel ->insert($data);

            return redirect()->to(uri: 'login');
        }

        return view('pages/register', [
            'pageTitle'=> 'Registrarse - Nike Corrientes',
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
