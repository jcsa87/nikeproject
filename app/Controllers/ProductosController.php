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

        $productosModel2 = new ProductosModel();

        $calzados = $productosModel2
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

        $producto = $productosModel
        ->select('productos.*, categoria.nombre as categoria_nombre')
        ->join('categoria', 'categoria.id_categoria = productos.id_categoria')
        ->where('productos.id_producto', $id)
        ->first();

        if(!$producto)
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Producto no encontrado.');
        }

        $session = session();
        $isAdmin = $session->get('user_rol') === 'admin';
        if ($producto['activo'] == 0 && !$isAdmin) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Producto no disponible.');
        }

        return view('producto/producto_detalle' , ['producto' => $producto]);

    }

    public function catalogo()
    {
    $productosModel = new ProductosModel();
    $categoriaModel = new CategoriaModel();

    // Filtros
    $nombre = $this->request->getGet('nombre');
    $categoria = $this->request->getGet('categoria');
    $minPrecio = $this->request->getGet('min_precio');
    $maxPrecio = $this->request->getGet('max_precio');
    $disponible = $this->request->getGet('disponible');
    $sexo = $this->request->getGet('sexo');
    $talle = $this->request->getGet('talle');

    $productosModel->select('productos.*, categoria.nombre as categoria_nombre')
        ->join('categoria', 'categoria.id_categoria = productos.id_categoria');
    
    if($nombre){
        $productosModel->like('productos.nombre',$nombre);
    }
    if ($categoria) {
        $productosModel->where('productos.id_categoria', $categoria);
    }
    if ($minPrecio) {
        $productosModel->where('productos.precio >=', $minPrecio);
    }
    if ($maxPrecio) {
        $productosModel->where('productos.precio <=', $maxPrecio);
    }
    if ($disponible === '1') {
        $productosModel->where('productos.cantidad >', 0);
    }
    if($sexo) {
        $productosModel->where('productos.sexo', $sexo);
    }

    if($talle) {
        $productosModel->where('productos.talle',$talle);
    }

    $productosModel->where('productos.activo', 1);

    $productos = $productosModel->findAll();
    $categorias = $categoriaModel->where('activo', 1)->findAll();

    return view('producto/catalogo', [
        'productos' => $productos,
        'categorias' => $categorias,
        'filtros' => [
            'categoria' => $categoria,
            'min_precio' => $minPrecio,
            'max_precio' => $maxPrecio,
            'disponible' => $disponible,
            'sexo' => $sexo,
            'talle' => $talle,
            'nombre' => $nombre,
        ]
    ]);
}
}