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

    

    // Método para obtener usuario por email
    public function obtenerUsuarioPorEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
