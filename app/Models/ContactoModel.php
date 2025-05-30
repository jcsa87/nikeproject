<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table = 'contacto';
    protected $primaryKey = 'id_contacto';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['nombre', 'email', 'telefono','mensaje','estado','fecha_hora'];
    protected $useTimestamps = false;
}