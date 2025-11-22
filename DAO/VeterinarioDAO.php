<?php
include_once '../Lib/Config/conexionSqli.php';

class VeterinarioDAO extends Connection
{
    private static $instance = NULL;
    
    public static function getInstance()
    {
        if (self::$instance == NULL)
            self::$instance = new VeterinarioDAO();
        return self::$instance;
    }
    
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM veterinario";
            $result = $this->execute($sql);
            return $result;
        } catch (PDOException $exc) {
            error_log('Error getAll() VeterinarioDAO:<br/>' . $exc->getMessage());
            return [];
        }
    }

    public function add($nombre, $email, $tel, $veterinaria, $direccion, $estado)
    {
        $rs = "";
        try {
            $sql = "INSERT INTO veterinario (vet_nombre, vet_email, vet_tel, vet_veterinaria, vet_direccion, vet_estado, fecha_crea) 
                    VALUES ('" . $nombre . "', '" . $email . "', '" . $tel . "', '" . $veterinaria . "', '" . $direccion . "', '" . $estado . "', NOW())";
            $result = $this->execute($sql);
            $rs = 1;
        } catch (PDOException $exc) {
            error_log('Error add() VeterinarioDAO:<br/>' . $exc->getMessage());
            $rs = 0;
        }
        return $rs;
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM veterinario WHERE vet_id = " . $id;
            $result = $this->execute($sql);
            return $result;
        } catch (PDOException $exc) {
            error_log('Error findById() VeterinarioDAO:<br/>' . $exc->getMessage());
            return [];
        }
    }

    public function update($id, $nombre, $email, $tel, $veterinaria, $direccion)
    {
        $rs = "";
        try {
            $sql = "UPDATE veterinario SET 
                    vet_nombre = '" . $nombre . "', 
                    vet_email = '" . $email . "', 
                    vet_tel = '" . $tel . "', 
                    vet_veterinaria = '" . $veterinaria . "', 
                    vet_direccion = '" . $direccion . "' 
                    WHERE vet_id = " . $id;
            $result = $this->execute($sql);
            $rs = 1;
        } catch (PDOException $exc) {
            error_log('Error update() VeterinarioDAO:<br/>' . $exc->getMessage());
            $rs = 0;
        }
        return $rs;
    }
    public function checkIfExists($email, $telefono = null)
{
    try {
        $sql = "SELECT COUNT(*) as count FROM veterinario WHERE vet_email = '" . $email . "'";
        
        // Si se proporciona teléfono, también validar por teléfono
        if ($telefono) {
            $sql .= " OR vet_tel = '" . $telefono . "'";
        }
        
        $result = $this->execute($sql);
        return ($result && $result[0]['count'] > 0) ? true : false;
    } catch (PDOException $exc) {
        error_log('Error checkIfExists() VeterinarioDAO:<br/>' . $exc->getMessage());
        return false;
    }
}

// Método alternativo para verificar solo por email (más común)
public function checkByEmail($email)
{
    try {
        $sql = "SELECT COUNT(*) as count FROM veterinario WHERE vet_email = '" . $email . "'";
        $result = $this->execute($sql);
        return ($result && $result[0]['count'] > 0) ? true : false;
    } catch (PDOException $exc) {
        error_log('Error checkByEmail() VeterinarioDAO:<br/>' . $exc->getMessage());
        return false;
    }
}

// Método para verificar por teléfono
public function checkByTelefono($telefono)
{
    try {
        $sql = "SELECT COUNT(*) as count FROM veterinario WHERE vet_tel = '" . $telefono . "'";
        $result = $this->execute($sql);
        return ($result && $result[0]['count'] > 0) ? true : false;
    } catch (PDOException $exc) {
        error_log('Error checkByTelefono() VeterinarioDAO:<br/>' . $exc->getMessage());
        return false;
    }
}
// Método para verificar si el email existe en otro veterinario (para actualización)
public function checkEmailExistsForOtherVet($currentId, $email)
{
    try {
        $sql = "SELECT COUNT(*) as count FROM veterinario WHERE vet_email = '" . $email . "' AND vet_id != " . $currentId;
        $result = $this->execute($sql);
        return ($result && $result[0]['count'] > 0) ? true : false;
    } catch (PDOException $exc) {
        error_log('Error checkEmailExistsForOtherVet() VeterinarioDAO:<br/>' . $exc->getMessage());
        return false;
    }
}

// Método para verificar si el teléfono existe en otro veterinario (para actualización)
public function checkTelefonoExistsForOtherVet($currentId, $telefono)
{
    try {
        $sql = "SELECT COUNT(*) as count FROM veterinario WHERE vet_tel = '" . $telefono . "' AND vet_id != " . $currentId;
        $result = $this->execute($sql);
        return ($result && $result[0]['count'] > 0) ? true : false;
    } catch (PDOException $exc) {
        error_log('Error checkTelefonoExistsForOtherVet() VeterinarioDAO:<br/>' . $exc->getMessage());
        return false;
    }
}
}