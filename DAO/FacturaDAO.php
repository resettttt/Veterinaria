<?php
include_once '../Lib/Config/conexionSqli.php';

class FacturaDAO extends Connection {
    private static $instance = NULL;
    
    public static function getInstance(){
        if(self::$instance == NULL)
            self::$instance = new FacturaDAO();
        return self::$instance;
    }

    public function findById($id){
        try{
            $sql = "SELECT * FROM encabezado_factura WHERE fac_id = '".$id."'";
            $result = $this->execute($sql);
            return $result;
        }catch(PDOException $exc) {
            error_log('Error findById() FacturaDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
    }

    public function getLastFacturaId() {
        $sql = "SELECT ultimo_creado AS last_id FROM consecutivo_documentos WHERE td_sigla = 'FV'";
        $result = $this->execute($sql);
        $row = $result->fetch_assoc();
        return $row['last_id'] ?? 0;
    }

    public function addCabecera($id, $fecha, $cliente, $observaciones, $usuario, $total){
        try {
            $sql = "INSERT INTO encabezado_factura(`fac_id`, `fac_fecha`, `tercero_identificacion`, `fac_observaciones`, `usu_crea`, `fac_total`, `fac_estado`)
            VALUES ($id, '".$fecha."', '".$cliente."', '".$observaciones."', '".$usuario."', $total, 'Activo')";
            $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
            error_log('Error AddCabecera() FacturaDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }

    public function addDetalleFactura($idFactura, $idExamen, $exaPrecio, $cantidad, $subtotal) {
        $rs="";
        try {
            $sql = "INSERT INTO detalle_factura(`fac_id`, `exa_id`, `exa_precio`, `det_cantidad`, `det_subtotal`)
            VALUES ('".$idFactura."', '".$idExamen."', '".$exaPrecio."','".$cantidad."', '".$subtotal."')";
            $result = $this->execute($sql);
            $rs=1;
        }catch (PDOException $exc) {
            error_log('Error addDetalleFactura() FacturaDAO:<br/>' . $exc->getMessage());
            $rs=0;
        }
        return $rs;
    }

    public function getUpdateFacturaId() {
        $sql = "UPDATE consecutivo_documentos SET ultimo_creado = ultimo_creado + 1 WHERE td_sigla = 'FV'";
        $result = $this->execute($sql);
    }
}