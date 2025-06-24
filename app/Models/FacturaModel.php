<?php

namespace App\Models;

use CodeIgniter\Model;

class FacturaModel extends Model
{
    protected $table = 'factura'; // Nombre de tu tabla en la base de datos (singular)
    protected $primaryKey = 'id_factura'; // Clave primaria de la tabla 'factura'
    protected $useAutoIncrement = true; // Indica que la PK es auto-incremental
    protected $returnType = 'array'; // Devuelve los resultados como arrays asociativos
    
    // Campos que están permitidos ser insertados/actualizados a través del modelo
    protected $allowedFields = [
        'id_usuario',      // Clave foránea al usuario que hizo la compra
        'medio_pago',
        'descuento',
        'metodo_entrega',
        'fecha_hora',      // Fecha y hora de la factura
        'importe_total',   // <<--- NOTA IMPORTANTE: Verificación del campo de suma
        'estado'
    ];
    
    protected $useTimestamps = false; // No usa campos created_at/updated_at automáticos

    // Puedes añadir métodos personalizados aquí si necesitas lógica de negocio específica para facturas.
    // Por ejemplo, para obtener un total de ventas específico, aunque ya lo haces en el controlador.
}