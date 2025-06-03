<?php

namespace App\Models;

use CodeIgniter\Model;

<<<<<<< HEAD
class UsuariosModel extends Model
{
    protected $table = 'usuarios';
=======
class UsuariosModel extends Model {

  public function obtenerUsuarioPorEmail($email){

    

    return $this->where('email',$email)->first();
  }


    protected $table = "usuarios";
>>>>>>> 94231f61bf1ec1e5f13c74cfec832f7096d5c16c
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombre', 'apellido', 'direccion', 'telefono',
        'email', 'password_hash', 'rol', 'activo'
    ];

    protected $useTimestamps = false;

<<<<<<< HEAD
    // Opcional: reglas de validación para insert/update
    protected $validationRules = [
        'nombre' => 'required|min_length[2]',
        'apellido' => 'required|min_length[2]',
        'direccion' => 'required',
        'telefono' => 'required',
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
        'telefono' => [
            'required' => 'El teléfono es obligatorio.',
        ],
        'password_hash' => [
            'required' => 'La contraseña es obligatoria.',
        ],
    ];
}
=======
  }
>>>>>>> 94231f61bf1ec1e5f13c74cfec832f7096d5c16c
