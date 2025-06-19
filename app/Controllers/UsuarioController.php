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
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required'    => 'El correo electrónico es obligatorio.',
                'valid_email' => 'Ingresá un correo electrónico válido.',
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required'    => 'La contraseña es obligatoria.',
                'min_length'  => 'La contraseña debe tener al menos 6 caracteres.',
            ]
        ]
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $model = new UsuariosModel();
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user && $user['activo'] && password_verify($password, $user['password_hash'])) {
        session()->set([
            'user_id'    => $user['id_usuario'],
            'user_name'  => $user['nombre'],
            'user_email' => $user['email'],
            'user_rol'   => $user['rol'],
            'logged_in'  => true
        ]);

        return redirect()->to('/')->with('success', '¡Inicio de sesión exitoso!');
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
        'nombre' => 'required|alpha_space|min_length[2]',
        'apellido' => 'required|alpha_space|min_length[2]',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'email_confirm' => 'required|matches[email]',
        'telefono' => 'permit_empty|regex_match[/^[0-9]{6,15}$/]',
        'password' => [
            'label' => 'Contraseña',
            'rules' => 'required|min_length[8]|max_length[30]|regex_match[/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])/]',
            'errors' => [
                'regex_match' => 'La contraseña debe tener al menos una mayúscula, una minúscula y un número.',
            ]
        ],
        'password_confirm' => 'required|matches[password]',
    ];

    $messages = [
        'email' => [
            'required'     => 'El correo electrónico es obligatorio.',
            'valid_email'  => 'Ingresá un correo electrónico válido.',
            'is_unique'    => 'El correo electrónico ya está registrado.',
        ],

        'nombre' => [
            'alpha_space' => 'El nombre solo puede contener letras y espacios.',
            'required' => 'El nombre es obligatorio.',
        ],
        'apellido' => [
            'alpha_space' => 'El apellido solo puede contener letras y espacios.',
            'required' => 'El apellido es obligatorio.',
        ],
        'telefono' => [
            'regex_match' => 'El teléfono debe tener entre 6 y 15 dígitos numéricos.',
        ],
        'password_confirm' => [
        'required' => 'Debes confirmar la contraseña.',
        'matches'  => 'Las contraseñas no coinciden.',
        ],

        'email_confirm' => [
            'matches' => 'Los correos electrónicos no coinciden.',
        ]
    ];

    if (!$this->validate($rules, $messages)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $model = new UsuariosModel();

    $data = [
        'nombre'        => $this->request->getPost('nombre'),
        'apellido'      => $this->request->getPost('apellido'),
        'telefono'      => $this->request->getPost('telefono'),
        'email'         => $this->request->getPost('email'),
        'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'rol'           => 'usuario',
        'activo'        => 1
    ];

    $model->insert($data);
    return redirect()->to('/Auth/Login')->with('success', 'Usuario registrado correctamente');
    }

}
