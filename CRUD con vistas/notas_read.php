

<!-- HEADER -->

<?php include_once './View/base/header.php';?>

<!-- CONTENT -->

  <div class="container mt-5 d-flex justify-content-end">

    <a href="./notas_create.php"
     class="btn btn-primary">Crear Notas</a>
  </div>
  
  <h1 class="text-center display-4">Tabla Notas</h1>

  <div class="container-fluid d-flex justify-content-center my-5">


    <table class="table text-center">
        <thead class="table-dark">

            <tr>
                <th scope="col">N</th>
                
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">INGRESO_NOTA</th>
                <th scope="col">CONSULTA_NOTA</th>
                <th scope="col">NOTA</th>
                
                <th scope="col">CORTE</th>
                
                <th scope="col">MATERIA</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ID ESTUDIANTE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody id="table">

        <?php

include_once "./controllers/notas_controller.php";

$actas = new ControllerNotas();

$array =json_decode($actas->Read());

#var_dump( $array[0]) ;

$j = 1;

#var_dump($array[0][0]);

   

for ($i=0; $i <  count($array[0]); $i++) { 
    echo 
    "<tr><td>" . $j . "</td>"

    . "<td>" . $array[0][$i]->id . "</td>"

    . "<td>" . $array[0][$i]->nombre . "</td>"

    . "<td>" . $array[0][$i]->ingreso_nota . "</td>"
    . "<td>" . $array[0][$i]->consulta_nota . "</td>"
    . "<td>" . $array[0][$i]->nota . "</td>"
    
    . "<td>" . $array[0][$i]->corte . "</td>"
    
    . "<td>" . $array[0][$i]->materia . "</td>"
    
    . "<td>" . $array[0][$i]->email . "</td>"
    
    
    . "<td>" . $array[0][$i]->data_fk->id . "</td>"

    . "<td>
     <div class='d-flex justify-content-center'>

    <a href='./notas_delete.php?id=" .$array[0][$i]->id."' class='btn btn-danger mx-2'>ELIMINAR</a> 

    <a href='./notas_update.php?id=". $array[0][$i]->id."' class='btn btn-primary mx-2' > EDITAR</a>
  
    </div>
    </td></tr>";
    $j++;
}

    
?>

        </tbody>
    </table>
    </div>



<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>