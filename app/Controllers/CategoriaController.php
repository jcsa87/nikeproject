<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use CodeIgniter\Controller;

class CategoriaController extends Controller
{
    public function index() 
    {
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel ->where('activo',1)->findAll();

        return view ('pages/categorias', ['categorias' => $categorias]);
    }

    //muestra producto de una categoría específica
    public function show($id)
    {
        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel->find($id);

        if(!$categoria) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Categoría no encontrada");
        }

        return view('pages/categoria_detalle',['categoria' => $categoria]);
    }
}