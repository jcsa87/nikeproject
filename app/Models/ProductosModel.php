<?php

namespace App\Models;

use Codeigniter\Model;

class ProductosModel extends Model {
    protected $table = "productos";
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true; //lo declaramos en mysql.

    protected $returnType = 'array'; // ó object
    protected $useSoftDeletes = '' ;//cómo se va a comportar la eliminación de registro. (si vammos a dar de bajas registros sin eliminarlos por completo)

    protected $allowedFields=['id_categoria','nombre','descripcion','precio','cantidad','sexo','talle','activo'];
    protected $useTimestamps = false;
  }