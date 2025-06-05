<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
    'nombre', 'apellido', 'email', 'direccion', 'password_hash', 'telefono', 'rol', 'activo'
    ];
    protected $useTimestamps = false;

    // Opcional: reglas de validación para insert/update
    protected $validationRules = [
        'nombre' => 'required|min_length[2]',
        'apellido' => 'required|min_length[2]',
        'direccion' => 'required',
        'telefono' => 'permit_empty',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'password_hash' => 'required',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'El correo ya está registrado.',
        ],
        'nombre' => [
            'required' => 'El nombre es obligatorio.',
        ],
        'apellido' => [
            'required' => 'El apellido es obligatorio.',
        ],
        'direccion' => [
            'required' => 'La dirección es obligatoria.',
        ],
        'password_hash' => [
            'required' => 'La contraseña es obligatoria.',
        ],
    ];

    // Método para obtener usuario por email
    public function obtenerUsuarioPorEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
