<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table = 'consulta'; // Nombre de tu tabla de consultas en la base de datos
    protected $primaryKey = 'id_consulta'; // Clave primaria de la tabla 'consulta'
    protected $useAutoIncrement = true; // Indica que la PK es auto-incremental
    protected $returnType = 'array';    // Devuelve los resultados como arrays asociativos
    
    // Campos que están permitidos ser insertados/actualizados a través del modelo
    protected $allowedFields = ['id_usuario', 'fecha_hora', 'asunto', 'mensaje', 'estado'];
    
    // No usa campos created_at/updated_at automáticos
    protected $useTimestamps = false; // Como usas 'fecha_hora' y no 'created_at'/'updated_at'

    /**
     * Obtiene las últimas consultas de usuarios, opcionalmente con información del usuario.
     * @param int $limit El número máximo de consultas a devolver.
     * @return array Los últimos registros de consulta.
     */
    public function getLatestConsultas(int $limit = 5): array
    {
        // Une con la tabla 'usuarios' para obtener el nombre, apellido y email del usuario
        return $this->select('consulta.*, usuarios.nombre as user_name, usuarios.apellido as user_lastname, usuarios.email as user_email')
                    ->join('usuarios', 'usuarios.id_usuario = consulta.id_usuario', 'left') // <-- CAMBIO CLAVE AQUÍ
                    ->orderBy('fecha_hora', 'DESC') // Ordena por el campo 'fecha_hora' de tu tabla 'consulta'
                    ->limit($limit)
                    ->findAll();
    }
}