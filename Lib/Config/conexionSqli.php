<?php

class Connection {

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "labpets");
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function execute($sql) {
        $result = $this->conn->query($sql);
        if (!$result) return [];
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>