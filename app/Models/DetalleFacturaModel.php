<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleFacturaModel extends Model
{
    protected $table = 'detalle_factura'; // Nombre de tu tabla de detalles de factura en la base de datos
    protected $primaryKey = 'id_detalle_factura'; // Clave primaria de la tabla 'detalle_factura'

    protected $useAutoIncrement = true; // Indica que la PK es auto-incremental
    protected $returnType = 'array';    // Devuelve los resultados como arrays asociativos

    // Campos que están permitidos ser insertados/actualizados a través del modelo
    protected $allowedFields = ['id_factura', 'id_producto', 'cantidad', 'subtotal'];
    
    // No usa campos created_at/updated_at automáticos
    protected $useTimestamps = false; 

    
}
