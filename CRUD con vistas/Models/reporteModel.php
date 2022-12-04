<?php

include_once('./Models/connection.php');

class reporteModelo {

    private $table = 'notas';
    


    public function generar(){

        $db = new DATABASE();

        try {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table inner join estudiantes on $this->table.id_estudiante = estudiantes.id WHERE consulta_nota BETWEEN ? AND ?");


            $sql->execute([
                $_POST['fecha_ini'],
                $_POST['fecha_fin']
            ]);

            $result = $sql->fetchAll(PDO::FETCH_OBJ);

               
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
   

}