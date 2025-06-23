<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use CodeIgniter\Controller;

class CarritoController extends Controller
{
    public function index()
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        return view('producto/carrito', ['carrito' => $carrito]);
    }

    public function agregar($id)
    {
        $productosModel = new ProductosModel();
        $producto = $productosModel->find($id);

        if (!$producto) {
            return redirect()->to('/producto/catalogo');
        }

        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += 1;
        } else {
            $carrito[$id] = [
                'id_producto' => $producto['id_producto'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'cantidad' => 1
            ];
        }

        $session->set('carrito', $carrito);

        return redirect()->to('/producto/catalogo');
    }

    public function eliminar($id)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        unset($carrito[$id]);
        $session->set('carrito', $carrito);

        return redirect()->to('/carrito');
    }

    public function vaciar()
    {
        session()->remove('carrito');
        return redirect()->to('/carrito');
    }
}
