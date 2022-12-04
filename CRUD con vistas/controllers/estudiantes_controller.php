<?php


class ControllerEstudiantes{


    public function read(){
        
        require_once  ("./Models/estudiantesModel.php");

        $model = new estudiantesModel();

        return json_encode($model->read());
     
    }


    public function create(){

        $json = json_decode(file_get_contents("php://input"), true);
        
        $json['nombre'] = $_POST['nombre'];
        $json['ciudad'] = $_POST['ciudad'];
        $json['telefono'] = $_POST['telefono'];

        require_once  ("./Models/estudiantesModel.php");

        $model = new estudiantesModel();

        $json['id'] = $model->create();

        header('Content-type:application/json;charset=utf-8');
        return json_encode($json);

    }

    public function delete(){
        
        require_once  ("./Models/estudiantesModel.php");

        $model = new estudiantesModel();
        
        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $model->delete()
        ]);
     
    }


    public function update(){
        require_once  ("./Models/estudiantesModel.php");

        $model = new estudiantesModel();
        
        
        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $model->update()
        ]);
     
    }

    
    public function estudiantesId(){

        require_once  ("./Models/estudiantesModel.php");

        $model = new estudiantesModel();

        return json_encode($model->estudiantesId());
     
    }

   


}
