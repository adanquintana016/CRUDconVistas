<?php


class ControllerReporte{


public function generar(){
    
    require_once  ("./Models/reporteModel.php");

    $model = new reporteModelo();

    return json_encode($model->generar());
 
}


}
