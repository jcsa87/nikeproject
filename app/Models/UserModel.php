<?php


namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";

    protected $allowedFields = [
        "nombre","apellido","direccion","telefono","email","password"
    ];
}