<?php


namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\CategoriaModel;
use CodeIgniter\Controller;

use App\Controllers\CategoriaController;

class ProductosController extends Controller
{
    public function index() 
    {
        
    }

    public function getProduct()
    {
        $productosModel = new ProductosModel();
        $categoriaModel = new CategoriaModel();

        //categorías activas
        $categorias = $categoriaModel ->where('activo',1)->findAll();

        // botines
        $botines = $productosModel
            -> select ('productos.*, categoria.nombre as categoria_nombre')
            -> join ('categoria', 'categoria.id_categoria = productos.id_categoria')
            -> where ('categoria.nombre' , 'Botines')
            -> where ('productos.activo' , '1')
            -> findAll();

        $calzados = $productosModel
            -> select ('productos.*, categoria.nombre as categoria_nombre')
            -> join ('categoria', 'categoria.id_categoria = productos.id_categoria')
            -> where ('productos.activo' , '1')
            -> findAll();

        return view('pages/home', [
            'categorias' => $categorias,
            'botines' => $botines,
            'calzados' => $calzados,
        ]);        
    }

    public function show($id)
    {
        $productosModel = new ProductosModel();
        $producto = $productosModel->find($id);

        if(!$producto)
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Producto no encontrado.');
        }

        return view('pages/producto/producto_detalle' , ['producto' => $producto]);

    }
}