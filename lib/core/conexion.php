<?php

class Conexion{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $db = DB_NAME;
    private $charset = DB_CHARSET;
    private PDO $conect;


    public function __construct() {
        $conectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;

        try {
            $this->conect = new PDO($conectionString,$this->user,$this->password);
            $this->conect->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            $this->conect = "Error de Conexion";
            echo "Error". $e->getMessage();
        }
    }

    public function conect() {
        return $this->conect;
    }
}