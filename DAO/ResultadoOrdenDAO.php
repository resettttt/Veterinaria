<?php
  include_once '../Lib/Config/conexionSqli.php';
class ResultadoOrdenDAO extends Connection{

    private static $instance = NULL;
    public static function getInstance(){
        if(self::$instance == NULL)
            self::$instance = new ResultadoOrdenDAO();
        return self::$instance;
        
    }

     public function getALL(){
        $sql = "SELECT OS.os_id, os_fecha, veterinario.vet_veterinaria, mascota.mas_nombre, mas_propietario
                 FROM `orden_servicio` OS
                 INNER JOIN veterinario ON OS.os_vet_id = veterinario.vet_id
                 INNER JOIN mascota ON OS.os_mas_id = mascota.mas_id;";
        $result = $this->execute($sql);
        return $result;
    }
    
}