<?php


class ControllerNotas{


    public function read(){
        
        require_once  ("./Models/notasModel.php");

        $model = new notasModel();          

   
        return json_encode([
            $model->read()
        ]);
     
    }

    #crea un nuevo cliente
    public function create(){

        $json['nombre']= $_POST['nombre'];
        $json['ingreso_nota']= $_POST['ingreso_nota'];
        $json['consulta_nota']= $_POST['consulta_nota'];
        $json['nota']= $_POST['nota'];
        $json['corte']= $_POST['corte'];
        $json['materia']= $_POST['materia'];
        $json['email']= $_POST['email'];
        $json['id_estudiante']= $_POST['id_estudiante'];

        require_once  ("./Models/notasModel.php");

        $model = new notasModel();  
        
        $json["peliculas"] = $model->create();

        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $json
        ]);

    }

    public function delete(){
        
        require_once  ("./Models/notasModel.php");

        $model = new notasModel();  
        
        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $model->delete()
        ]);
     
    }


    public function update(){
      
        require_once  ("./Models/notasModel.php");

        $model = new notasModel();  
        
        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $model->update()
        ]);
     
    }

    
    public function notasId(){
        require_once  ("./Models/notasModel.php");

        $model = new notasModel();  
        

        return json_encode($model->notasId());
     
    }

   


}
