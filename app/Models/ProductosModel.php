<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table = "productos"; // Nombre de tu tabla de productos en la base de datos
    protected $primaryKey = 'id_producto'; // Clave primaria de la tabla 'productos'

    protected $useAutoIncrement = true; // Indica que la PK es auto-incremental (como lo declaras en MySQL)

    protected $returnType = 'array'; // Devuelve los resultados como arrays asociativos
    // Cómo se va a comportar la eliminación de registros.
    // Si 'true', los registros no se eliminan físicamente, solo se marcan con un campo 'deleted_at'.
    protected $useSoftDeletes = false; 

    // Campos que están permitidos ser insertados/actualizados a través del modelo
    protected $allowedFields = ['id_categoria', 'nombre', 'descripcion', 'precio', 'cantidad', 'sexo', 'talle', 'activo', 'imagen'];
    
    // No usa campos created_at/updated_at automáticos
    protected $useTimestamps = false; 

    /**
     * Obtiene el número total de productos que están marcados como activos.
     * @return int El número de productos activos.
     */
    public function getTotalActiveProducts(): int
    {
        return $this->where('activo', 1)->countAllResults();
    }

    /**
     * Obtiene el número total de productos activos que tienen stock disponible (cantidad > 0).
     * @return int El número de productos activos con stock.
     */
    public function getTotalProductsInStock(): int
    {
        return $this->where('activo', 1)->where('cantidad >', 0)->countAllResults();
    }
}
