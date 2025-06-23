<?php
namespace App\Controllers;
use App\Models\FacturaModel;
use App\Models\DetalleFacturaModel;
use App\Models\ProductosModel;

class FacturaController extends BaseController
{
    public function ver($id)
    {
        $facturaModel = new FacturaModel();
        $detalleModel = new DetalleFacturaModel();
        $productosModel = new ProductosModel();

        $factura = $facturaModel->find($id);
        if (!$factura) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Factura no encontrada');
        }

        // Seguridad: solo el dueño o admin puede ver la factura
        $session = session();
        if ($session->get('user_rol') !== 'admin' && $session->get('user_id') != $factura['id_usuario']) {
            return redirect()->to('/')->with('error', 'No tienes permiso para ver esta factura.');
        }

        $detalles = $detalleModel->where('id_factura', $id)->findAll();
        foreach ($detalles as &$detalle) {
            $detalle['producto'] = $productosModel->find($detalle['id_producto']);
        }

        return view('producto/factura_detalle', [
            'factura' => $factura,
            'detalles' => $detalles
        ]);
    }
}