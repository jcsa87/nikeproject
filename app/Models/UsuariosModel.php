<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model {

  public function obtenerUsuarioPorEmail($email){

    

    return $this->where('email',$email)->first();
  }


    protected $table = "usuarios";
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true; //lo declaramos en mysql.

    protected $returnType = 'array'; // ó object
    protected $useSoftDeletes = '' ;//cómo se va a comportar la eliminación de registro. (si vammos a dar de bajas registros sin eliminarlos por completo)

    protected $allowedFields=['nombre','apellido','direccion','telefono','email','password','rol','activo'];
    protected $useTimestamps = false;

  }