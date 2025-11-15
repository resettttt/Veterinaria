<?php
include_once '../Lib/Config/conexionSqli.php';
class OrdenServicioDAO extends Connection{
    public function getAll(){
        $sql = "SELECT OS.os_id, OS.os_fecha, V.vet_veterinaria, M.mas_nombre, OS.os_estado
                FROM orden_servicio OS
                INNER JOIN veterinario V ON OS.os_vet_id = V.vet_id
                INNER JOIN mascota M ON OS.os_mas_id = M.mas_id;";
        return $this->execute($sql);
    }
}
