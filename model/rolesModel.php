<?php

class rolesModel extends Mysql{
    public function __construct(){
        parent::__construct();    
    }

    public function setRole(string $name, string $descrip, string $status){
        $query = "INSERT INTO rol(nombre,descripcion,status) VALUES(?,?,?)";
        $arrData = array($name, $descrip, $status);
        $request_insert = $this->insert($query, $arrData);
        return $request_insert;
    }

    public function getRoles(){
        $query = "SELECT * FROM rol";
        $request = $this->selectAll($query);
        return $request;
    }

    public function updateRole(int $id, string $name, string $descrip, string $status){
        $query = "UPDATE rol SET nombre = ?, descripcion = ?, status = ? WHERE id_rol = $id";
        $arrData = array($name, $descrip, $status);
        $request = $this->update($query, $arrData);
        return $request;
    }

    public function deleteRole($id){
        $query = "DELETE FROM rol WHERE id_rol = $id";
        $request = $this->delete($query);
        return $request;
    }


}