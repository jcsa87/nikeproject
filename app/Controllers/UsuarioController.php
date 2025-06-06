<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class UsuarioController extends Controller
{
    public function login()
    {
        return view('pages/Auth/Login', [
            'pageTitle' => 'Iniciar Sesión - Nike Corrientes',
        ]);
    }

    public function doLogin()
    {

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UsuariosModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password_hash'])) {
            session()->set([
                'user_id' => $user['id_usuario'],
                'user_name' => $user['nombre'],
                'user_email' => $user['email'],
                'logged_in' => true
            ]);

            return redirect()->to('/')->with('success', '¡Inicio de sesión existoso!');
        }

        return redirect()->back()->withInput()->with('error', 'Credenciales incorrectas.');
    }

    public function logout()
    {
    session()->destroy();
    return redirect()->to('/')->with('success', 'Sesión cerrada correctamente.');
    }

    public function register()
    {
        return view('pages/Auth/Register', [
            'pageTitle' => 'Registrarse - Nike Corrientes',
        ]);
    }

    public function doRegister()
    {
        $rules = [
            'nombre' => 'required|min_length[2]',
            'apellido' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'email_confirm' => 'matches[email]',
            'telefono' => 'permit_empty',
            'password' => 'required|min_length[6]',
        ];
        $messages = [
            'email' => [
                'is_unique' => 'El correo electrónico ya está registrado.',
            ],
            'nombre' => [
                'required' => 'El nombre es obligatorio.',
            ],
            'apellido' => [
                'required' => 'El apellido es obligatorio.',
            ],
            'password' => [
                'required' => 'La contraseña es obligatoria.',
                'min_length' => 'La contraseña debe tener al menos 6 caracteres.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $model = new UsuariosModel();
        $email = $this->request->getPost('email');

        if ($model->where('email', $email)->first()) {
            return redirect()->back()->withInput()->with('error', 'El correo electrónico ya está registrado.');
        }

        $data = [
            'nombre'        => $this->request->getPost('nombre'),
            'apellido'      => $this->request->getPost('apellido'),
            'telefono'      => $this->request->getPost('telefono'),
            'email'         => $email,
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol'           => 'usuario',
            'activo'        => 1
    ];


        $model->insert($data);
        return redirect()->to('/Auth/Login')->with('success', 'Usuario registrado correctamente');

        //return redirect()->to('/Auth/register');
    }
}
