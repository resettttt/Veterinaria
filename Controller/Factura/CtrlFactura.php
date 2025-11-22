<<?php

class CtrlFactura
{
    public function read()
    {
        include_once '../Controller/Examen/CtrlExamen.php';
        include_once '../Controller/Tercero/CtrlTercero.php';
        include_once '../View/Factura/ViewFactura.php';
    }

    public function postNew()
    {
        dd($_POST);
        $fac_id = $_POST['fac_id'];
        $fac_fecha = $_POST['fac_fecha'];
        $tercero_identificacion = $_POST['tercero_identificacion'];
        $fac_observaciones = $_POST['fac_observaciones'];
        $examen = $_POST['examen'];
        $listPrecio = $_POST['listPrecio'];
        $listCantidad = $_POST['listCantidad'];
        $listSubtotal = $_POST['listSubtotal'];
        $fac_total = array_sum($listSubtotal);

        $res = FacturaDAO::getInstance()->addCabecera($fac_id, $fac_fecha, $tercero_identificacion, $fac_observaciones, "123", $fac_total);

        if ($res == 1) {
            for ($i = 0; $i < count($examen); $i++) {
                FacturaDAO::getInstance()->addDetalleFactura($fac_id, $examen[$i], $listPrecio[$i], $listCantidad[$i], $listSubtotal[$i]);
            }
            FacturaDAO::getInstance()->getUpdateFacturaId();
            messageSweetAlert("¡Atención!", "Registro Exitoso !!!", "success", getUrl('Factura', 'Factura', 'read'));
        } else {
            messageSweetAlert("¡Atención!", "Error al registrar !!!", "error", getUrl('Factura', 'Factura', 'read'));
        }
    }
}