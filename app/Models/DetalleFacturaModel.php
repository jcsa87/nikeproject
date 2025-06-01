<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleFacturaModel extends Model
{
    protected $table = 'detalle_factura';
    protected $primaryKey = 'id_detalle_factura';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['id_factura', 'id_producto', 'cantidad', 'subtotal'];
    protected $useTimestamps = false;
}