<?php


namespace App\Models;

use CodeIgniter\Model;

class FacturaModel extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'id_factura';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['id_usuario','medio_pago','descuento','metodo_entrega', 'fecha_hora', 'importe_total', 'estado'];
    protected $useTimestamps = false;
}