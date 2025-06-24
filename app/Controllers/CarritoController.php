<?php

namespace App\Controllers;

use App\Models\DetalleFacturaModel;
use App\Models\FacturaModel;
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

    public function eliminarProducto($id)
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

    public function checkout()
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];
        $userId = $session->get('user_id');
        
        if (empty($carrito) || !$userId) {
            return redirect()->to('/carrito')->with('error', 'No hay productos en el carrito o no has iniciado sesión.');
        }

        // Datos de un formulario de pago real
        $medio_pago = $this->request->getPost('medio_pago') ?? 'Tarjeta';
        $metodo_entrega = $this->request->getPost('metodo_entrega') ?? 'Retiro en tienda';
        $descuento = 0; // Lógica de descuentos si aplica

        $importe_total = 0;
        foreach ($carrito as $item) {
            $importe_total += $item['precio'] * $item['cantidad'];
        }

        $importe_total -= $descuento;

        $facturaModel = new FacturaModel();
        $detalleModel = new DetalleFacturaModel();

        // Creamos factura
        $facturaId = $facturaModel->insert([
            'id_usuario' => $userId,
            'medio_pago' => $medio_pago,
            'importe_total' => $importe_total,
            'descuento' => $descuento,
            'fecha_hora' => date('Y-m-d H:i:s'),
            'estado' => 'Pagada',
            'metodo_entrega' => $metodo_entrega
        ], true);

        // Creamos detalle factura
        foreach ($carrito as $item) {
            $detalleModel->insert([
                'id_factura' => $facturaId,
                'id_producto' => $item['id_producto'],
                'cantidad' => $item['cantidad'],
                'subtotal' => $item['precio'] * $item['cantidad']
            ]);
        }

        $session->remove('carrito');

        return view('producto/factura', [
            'factura_id' => $facturaId
        ]);
    }

    // Métodos para manejar solicitudes POST del JavaScript
    public function aumentar($id)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += 1;
            $session->set('carrito', $carrito);
            $success = true;
        } else {
            $success = false;
        }

        return $this->response->setJSON([
            'success' => $success,
            'message' => $success ? 'Cantidad aumentada' : 'Producto no encontrado en el carrito'
        ]);
    }

    public function disminuir($id)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id]) && $carrito[$id]['cantidad'] > 1) {
            $carrito[$id]['cantidad'] -= 1;
            $session->set('carrito', $carrito);
            $success = true;
        } elseif (isset($carrito[$id]) && $carrito[$id]['cantidad'] == 1) {
            unset($carrito[$id]);
            $session->set('carrito', $carrito);
            $success = true;
        } else {
            $success = false;
        }

        return $this->response->setJSON([
            'success' => $success,
            'message' => $success ? 'Cantidad disminuida' : 'Producto no encontrado o cantidad mínima'
        ]);
    }

    public function eliminarUno($id)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id]) && $carrito[$id]['cantidad'] > 1) {
            $carrito[$id]['cantidad'] -= 1;
            $session->set('carrito', $carrito);
            $success = true;
        } elseif (isset($carrito[$id]) && $carrito[$id]['cantidad'] == 1) {
            unset($carrito[$id]);
            $session->set('carrito', $carrito);
            $success = true;
        } else {
            $success = false;
        }

        return $this->response->setJSON([
            'success' => $success,
            'message' => $success ? 'Unidad eliminada' : 'Producto no encontrado o cantidad mínima'
        ]);
    }

    public function eliminar($id)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            $session->set('carrito', $carrito);
            $success = true;
        } else {
            $success = false;
        }

        return $this->response->setJSON([
            'success' => $success,
            'message' => $success ? 'Producto eliminado' : 'Producto no encontrado en el carrito'
        ]);
    }
}