<?php


include_once('./Models/connection.php');

class estudiantesModel{

       //Nombre de la tabla
   private $table = 'estudiantes';


    public function read(){

        $db = new DATABASE();

        try
        {
            $stm = $db->getConnection()->prepare("SELECT * FROM $this->table");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;
       
           
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }

     
    }


    public function create(){

        $db = new DATABASE();

        try{

            $stm= $db->getConnection()->prepare("INSERT INTO $this->table (NOMBRE,CIUDAD,TELEFONO) VALUES (?,?,?)");
            
            $stm->execute([
                $_POST['nombre'],
                $_POST['ciudad'],
                $_POST['telefono'],
            ]);

        }catch(PDOException $e){
        echo $e->getMessage();
        }
    }

        //Elimina un registro por Id
    public function delete(){

        $db = new DATABASE();

        try
        {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where ID= ?");
            $sql->execute([$_POST['id']]);
            $result = $sql->rowCount();

            if ($result<=0) {
                $res = array("ID ". $_POST['id'] => "no exite registro");

                return $res;

            } else {
            
                $dato =$sql->fetch(PDO::FETCH_OBJ);

                
                $id = $_POST['id'];
                $statement = $db->getConnection()->prepare("DELETE FROM $this->table where id=:id");
                $statement->bindValue(':id', $id);
                $statement->execute();
                header("HTTP/1.1 200 OK");

                $res = array(
                    'mensaje'=> 'Registro eliminado satisfactoriamente',
                    'data' => array(
                        'id' =>  $dato->Id ,
                        'nombre' =>  $dato->Nombre,
                        'telefono' =>  $dato->Telefono ,
                        'ciudad' =>  $dato->Ciudad,
                    )
                );
                
                return $res;
            }
           
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

     // Actualiza un resgistro por Id
     public function update(){

        $db = new DATABASE();
        try{
            
             //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where ID= ?");
            $sql->execute([
                $_POST['id']
            ]);
            $result = $sql->rowCount();

            if ($result<=0) {
            $res = array("ID ". $_POST['id'] => "no exite registro");

            return $res;

            } else {
            
                $dato =$sql->fetch(PDO::FETCH_OBJ);

                $sql = "UPDATE $this->table SET NOMBRE= ? , CIUDAD = ? , TELEFONO = ?  WHERE ID= ? ";

                $statement = $db->getConnection()->prepare($sql);
                $statement->execute([
                    $_POST['nombre'],
                    $_POST['ciudad'],
                    $_POST['telefono'],
                    $_POST['id'],
                ]);

                header("HTTP/1.1 200 OK");

                $res = array(
                    'mensaje'=> 'Registro actualizado satisfactoriamente',
                    'data' => array(
                        'id' =>  $dato->Id ,
                        'nombre' =>  $_POST['nombre'],
                        'telefono' =>  $_POST['telefono'] ,
                        'ciudad' =>  $_POST['ciudad'],
                    )
                );

                return $res;
            }

        }catch(PDOException $e){
            header('Content-type:application/json;charset=utf-8');
            echo json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $e->getMessage()
                ]
            ]);
        }
    }

       //Obtiene un registro por Id
    public function estudiantesId(){

        $db = new DATABASE();

        try{
           
          
            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where id= ?");
            $sql->execute([$_GET['id']]);
            $result = $sql->rowCount();

           
            if ($result>=0) {
               
                //Mostrar un post
                $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where id=?");
                $sql->execute([
                    $_GET['id']
                ]);
                
                return  $sql->fetch(PDO::FETCH_ASSOC)  ;

                exit();
                
            
            }else{
                $res = array("ID ". $_GET['id'] => "no exite");

                return $res;
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

}