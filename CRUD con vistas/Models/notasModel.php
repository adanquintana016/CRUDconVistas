<?php


include_once('./Models/connection.php');

class notasModel
{

    //Nombre de la tabla
    private $table = 'notas';


    public function read()
    {

        $db = new DATABASE();

        try {
            $stm = $db->getConnection()->prepare("SELECT * FROM $this->table");
            $stm->execute();

            $res = array();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $key => $dato) {

                $statement = $db->getConnection()->prepare("SELECT * from estudiantes WHERE id = ?");
                $statement->execute([
                    $dato->id_estudiante
                ]);

                $fk = $statement->fetch(PDO::FETCH_OBJ);
             
                array_push($res,array(
                    'id' =>  $dato->id ,
                    'nombre' =>  $dato->nombre,
                    'ingreso_nota' =>  $dato->ingreso_nota,
                    'consulta_nota' =>  $dato->consulta_nota, 
                    'nota' =>  $dato->nota,
                    'corte' =>  $dato->corte,
                    'materia' =>  $dato->materia,
                    'email' =>  $dato->email, 
                    "data_fk"=> array(
                      'id' =>  $fk->id ,
                      'NOMBRE' =>  $fk->Nombre,
                      'CIUDAD' =>  $fk->Ciudad ,
                      'TELEFONO' =>  $fk->Telefono
                    ))
                  );

                
            }

            return $res;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function create()
    {

        $db = new DATABASE();

        try {

            $stm = $db->getConnection()->prepare("INSERT INTO $this->table
            (NOMBRE,INGRESO_NOTA,CONSULTA_NOTA,NOTA,CORTE,MATERIA,EMAIL,ID_ESTUDIANTE) VALUES (?,?,?,?,?,?,?,?)");

            $stm->execute([
                $_POST['nombre'],
                $_POST['ingreso_nota'],
                $_POST['consulta_nota'],
                $_POST['nota'],
                $_POST['corte'],
                $_POST['materia'],
                $_POST['email'],
                $_POST['id_estudiante']

            ]);


            //busca el los datos del fk 
            $sql1 = $db->getConnection()->prepare("SELECT * FROM estudiantes where id= ?");
            $sql1->execute([
                $_POST['id_estudiante']
            ]);

            $fk = $sql1->fetch(PDO::FETCH_OBJ);

            return $fk;
        } catch (PDOException $e) {
            header('Content-type:application/json;charset=utf-8');
            echo json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $e->getMessage()
                ]
            ]);
        }
    }

    //Elimina un registro por Id
    public function delete()
    {

        $db = new DATABASE();

        try {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where ID= ?");
            $sql->execute([$_POST['id']]);
            $result = $sql->rowCount();

            if ($result <= 0) {
                $res = array("ID " . $_POST['id'] => "no exite registro");

                return $res;
            } else {

                $dato = $sql->fetch(PDO::FETCH_OBJ);

                //busca el los datos del fk 
                $sql1 = $db->getConnection()->prepare("SELECT * FROM estudiantes where id= ?");
                $sql1->execute([$dato->id_estudiante]);

                $fk = $sql1->fetch(PDO::FETCH_OBJ);


                $id = $_POST['id'];
                $statement = $db->getConnection()->prepare("DELETE FROM $this->table where id= ?");
                $statement->execute([
                    $id
                ]);
                header("HTTP/1.1 200 OK");

                $res = array(
                    'mensaje' => 'Registro eliminado satisfactoriamente',
                    'id' =>  $dato->Id ,
                    'MATERIA' =>  $dato->Materia,
                    'ingreso_nota' =>  $dato->ingreso_nota,
                    'consulta_nota' =>  $dato->consulta_nota, 
                    'nota' =>  $dato->nota,
                    'EMAIL' =>  $dato->Email,
                    'FECHA_FINAL' =>  $dato->Fecha_final, 
                    "data_fk"=> array(
                      'id' =>  $fk->Id ,
                      'NOMBRE' =>  $fk->Nombre,
                      'DOCUMENTO' =>  $fk->Documento ,
                      'DESCRIPCION' =>  $fk->Descripcion
                    )
                );

                return $res;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Actualiza un resgistro por Id
    public function update()
    {

        $db = new DATABASE();


        try {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where ID= ?");
            $sql->execute([
                $_POST['id']
            ]);

            $result = $sql->rowCount();

            if ($result <= 0) {
                $res = array("ID " . $_POST['id'] => "no exite registro");

                return $res;
            } else {

                $dato = $sql->fetch(PDO::FETCH_OBJ);

                $sql = "UPDATE $this->table SET NOMBRE = ?,INGRESO_NOTA = ?,CONSULTA_NOTA = ?,NOTA = ?,CORTE = ?,MATERIA = ?,EMAIL = ?,ID_ESTUDIANTE = ?  WHERE id= ? ";

                $statement = $db->getConnection()->prepare($sql);
                $statement->execute([
                    $_POST['nombre'],
                    $_POST['ingreso_nota'],
                    $_POST['consulta_nota'],
                    $_POST['nota'],
                    $_POST['corte'],
                    $_POST['materia'],
                    $_POST['email'],
                    $_POST['id_estudiante'],
                    $_POST['id'],
                ]);


                //busca el los datos del fk 
                $sql1 = $db->getConnection()->prepare("SELECT * FROM estudiantes where id= ?");
                $sql1->execute([$_POST['id_estudiante']]);

                $fk = $sql1->fetch(PDO::FETCH_OBJ);

                $res = array(
                    'mensaje' => 'Registro Actualizado satisfactoriamente',
                    'id' =>  $dato->id ,
                    'materia' =>  $dato->materia,
                    'ingreso_nota' =>  $dato->ingreso_nota,
                    'consulta_nota' =>  $dato->consulta_nota, 
                    'nota' =>  $dato->nota,
                    'EMAIL' =>  $dato->email,
                    'nombre' =>  $dato->nombre, 
                    'corte' =>  $dato->corte, 
                    "data_fk"=> array(
                      'id' =>  $fk->id ,
                      'NOMBRE' =>  $fk->Nombre,
                      'Ciudad' =>  $fk->Ciudad ,
                      'Telefono' =>  $fk->Telefono
                    )

                );

                return $res;
            }
        } catch (PDOException $e) {
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
    public function notasId()
    {

        $db = new DATABASE();
        try {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where id= ?");
            $sql->execute([$_GET['id']]);
            $result = $sql->rowCount();

            if ($result <= 0) {
                $res = array("ID " . $_GET['id'] => "no exite este registro");

                return $res;
            } else {

                //Mostrar lista de post
                $sql = $db->getConnection()->prepare("SELECT * FROM $this->table WHERE ID = ?");
                $sql->execute([$_GET['id']]);

                $dato = $sql->fetch(PDO::FETCH_OBJ);


                #var_dump($dato);
                //busca el los datos del fk 
                $sql1 = $db->getConnection()->prepare("SELECT * FROM estudiantes where id= ?");
                $sql1->execute([$dato->id_estudiante]);

                $fk = $sql1->fetch(PDO::FETCH_OBJ);

                $res =  array(
                    'id' =>  $dato->id ,
                    'materia' =>  $dato->materia,
                    'ingreso_nota' =>  $dato->ingreso_nota,
                    'consulta_nota' =>  $dato->consulta_nota, 
                    'nota' =>  $dato->nota,
                    'EMAIL' =>  $dato->email,
                    'nombre' =>  $dato->nombre, 
                    'corte' =>  $dato->corte, 
                    "data_fk"=> array(
                      'id' =>  $fk->id ,
                      'NOMBRE' =>  $fk->Nombre,
                      'Ciudad' =>  $fk->Ciudad ,
                      'Telefono' =>  $fk->Telefono
                    
                    )
                );

                header("HTTP/1.1 200 OK");
                return $res;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
