<?php

namespace App\Controllers;
use App\Models\ProductosModel;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
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

    return view('pages/home', [
        'pageTitle'=> 'Inicio - Nike Corrientes',
        'botines'  => $botines,
        'calzados' => $calzados,
    ]);
    }
    public function about()
    {
        return view('Pages/about', [
            'pageTitle'=> 'Nosotros - Nike Corrientes',
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
