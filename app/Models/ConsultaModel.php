<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id_consulta';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['id_usuario', 'fecha_hora', 'asunto','mensaje', 'estado'];
    protected $useTimestamps = false;
}