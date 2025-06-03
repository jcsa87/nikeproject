<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class UsuarioController extends Controller
{
    public function login()
    {
        return view('pages/Auth/login', [
            'pageTitle' => 'Iniciar Sesión - Nike Corrientes',
        ]);
    }

    public function doLogin()
    {
        helper(['form']);

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
                'user_id' => $user['id'],
                'user_name' => $user['nombre'],
                'user_email' => $user['email'],
                'logged_in' => true
            ]);

            return redirect()->to('/dashboard'); // Cambiá esto por tu ruta principal
        }

        return redirect()->back()->withInput()->with('error', 'Credenciales incorrectas.');
    }

    public function register()
    {
        return view('pages/Auth/register', [
            'pageTitle' => 'Registrarse - Nike Corrientes',
        ]);
    }

    public function doRegister()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $userModel = new UsuariosModel();

            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'email' => $this->request->getPost('email'),
                'direccion' => $this->request->getPost('direccion'),
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'telefono' => $this->request->getPost('telefono'),
                'rol' => 'usuario',
                'activo' => 1
            ];

            if (!$userModel->insert($data)) {
                return redirect()->back()->withInput()->with('errors', $userModel->errors());
            }

            return redirect()->to('/login');
        }
    }
}
