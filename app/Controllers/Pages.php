<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\ProductosModel;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->where('activo', 1)->findAll();

        $session = session();
        $rol = $session->get('user_rol');
        $isLogged = $session->get('logged_in');

        $productosModel = new ProductosModel();
        $botines = $productosModel
        ->where('id_categoria', 1)
        ->where('activo', 1)
        ->findAll();

        $productosModel2 = new ProductosModel();
        $calzados = $productosModel2
        ->select('productos.*, categoria.nombre as categoria_nombre')
        ->join('categoria', 'categoria.id_categoria = productos.id_categoria')
        ->where('productos.activo', '1')
        ->findAll();

        $data = [
            'categorias' => $categorias,
            'calzados' => $calzados,
            'botines' => $botines,
        ];


        if($isLogged && $rol === 'admin'){
            return view('pages/Admin/adminPage', $data);
         
         } else {
            return view('pages/home/home', $data);
        }

    }
    public function about()
    {
        return view('Pages/about', [
            'pageTitle'=> 'Nosotros - Nike Corrientes',
        ]);
    }

    public function consulta()
    {
        return view('Pages/consulta', [
            'pageTitle'=> 'Consulta - Nike Corrientes',
        ]);
    }
    public function comercialization()
    {
        return view('Pages/comercialization', [
            'pageTitle'=> 'Comercialización - Nike Corrientes',
        ]);
    }
    public function terms_uses()
    {
        return view('Pages/terms_uses', [
            'pageTitle'=> 'Términos y Condiciones - Nike Corrientes',
        ]);
    }
    public function contact()
    {
        return view('Pages/contact', [
            'pageTitle'=> 'Contacto - Nike Corrientes',
        ]);
    }


    public function maintenance()
    {
        return view('pages/maintenance', [
            'pageTitle'=> 'Mantenimiento - Nike Corrientes',
        ]);
    }

}
