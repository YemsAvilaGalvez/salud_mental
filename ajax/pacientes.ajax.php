<?php

require_once '../Controller/paciente/pacientes.controlador.php';
require_once '../Model/pacientes.modelo.php';
require_once '../vendor/autoload.php';

class ajaxPacientes
{

    public $filePacientes;

    public $codigo_producto;
    public $id_categoria_producto;
    public $descripcion_producto;
    public $precio_compra_producto;
    public $precio_venta_producto;
    public $utilidad;
    public $stock_producto;
    public $minimo_stock_producto;
    public $ventas_producto;

    public function ajaxCargarPacientes()
    {

        $respuesta = PacientesControlador::ctrCargarPaciente($this->filePacientes);

        echo json_encode($respuesta);
    }

    public function ajaxListarProductos()
    {

        $productos = ProductosControlador::ctrListarProductos();

        echo json_encode($productos);
    }

    public function ajaxRegistrarProducto()
    {

        $producto = ProductosControlador::ctrRegistrarProducto(
            $this->codigo_producto,
            $this->id_categoria_producto,
            $this->descripcion_producto,
            $this->precio_compra_producto,
            $this->precio_venta_producto,
            $this->utilidad,
            $this->stock_producto,
            $this->minimo_stock_producto,
            $this->ventas_producto
        );

        echo json_encode($producto);
    }
}

if (isset($_FILES)) {
    $archivo_paciente = new ajaxPacientes();
    $archivo_paciente->filePacientes = $_FILES['filePaciente'];
    $archivo_paciente->ajaxCargarPacientes();
}
