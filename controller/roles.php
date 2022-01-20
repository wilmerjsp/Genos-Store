<?php

class Roles extends Controllers{

    public string $id;
    public string $nombreRole;
    public string $descripRole;
    public string $status;
    public string $options;

    public function __construct() {
        parent::__construct();

        $this->nombreRole = "nombre de prueba";
        $this->status = "status de prueba";
        $this->descripRole = "descrip de prueba";
    }

    public function roles() {
        $data['page_id'] = 3;
        $data['page_tag'] = "Roles de Usuarios";
        $data['page_title'] = "Roles de Usuarios";
        $data['page_name'] = "roles_usuarios";
        
        $this->views->getView($this,"roles",$data);

    }

    public function verRoles(){
        $arrResponses = array('status' => false, 'data' => "");
        $data =  $this->model->getRoles();

        if (!empty($data)) {
            $arrResponses['status'] = true;
            $arrResponses['data'] = $data;
        }
        // $jsonString = json_encode($arrResponses);
        // echo $jsonString;
        echo json_encode($arrResponses);
        
    }

    public function insertRole(){

        if (isset($_POST)) {
            if (empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['listStatus'])) {

                $arraResponse = array('status'=> false, 'msg'=> 'Error en los Datos');
                
            }else{
                $this->nombreRole = ucwords(trim($_POST['txtNombre'])) ;
                $this->descripRole = ucwords(trim($_POST['txtDescripcion'],"\t\n\r\0\x0B"));
                $this->status = ucwords((trim($_POST['listStatus'])));
        
                $data = $this->model->setRole($this->nombreRole,$this->descripRole,$this->status);
                
                if($data > 0){
                    $arraResponse = array('status'=> true, 'msg'=> 'Registro Guardado');
                }else {
                    $arraResponse = array('status'=> false, 'msg'=> 'Error al guardar los datos');
                }
                
            }
            echo json_encode($arraResponse);
            
        }
        die();
    }

    public function updateRole(){
        if (isset($_POST)) {

            if (empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['listStatus'])) {

                $arraResponse = array('status'=> false, 'msg'=> 'No puede dejar campos vacios');
                
            }else{
                $this->id = $_POST['txtId'];
                $this->nombreRole = ucwords(trim($_POST['txtNombre'])) ;
                $this->descripRole = ucwords(trim($_POST['txtDescripcion'],"\t\n\r\0\x0B"));
                $this->status = ucwords((trim($_POST['listStatus'])));

                $data = $this->model->updateRole($this->id,$this->nombreRole,$this->descripRole,$this->status);

                if($data > 0){
                    $arraResponse = array('status'=> true, 'msg'=> 'Registro Actualizado con exito');
                }else {
                    $arraResponse = array('status'=> false, 'msg'=> 'Error al Actualizar los datos');
                }
                
            }
            echo json_encode($arraResponse);
            
        }
        die();
    }

    public function deleteRole(){
        if (isset($_POST)) {
            if (empty($_POST['txtId'])) {
                $arraResponse = array('status'=> false, 'msg'=> 'Error en los datos');
            }else {
                $this->id = $_POST['txtId'];
                $data = $this->model->deleteRole($this->id);

                if($data > 0){
                    $arraResponse = array('status'=> true, 'msg'=> 'Registro Borrado con exito');
                }else {
                    $arraResponse = array('status'=> false, 'msg'=> 'Error al borrar los datos');
                }
                
            }
            echo json_encode($arraResponse);
        }
        die();
    }

}








