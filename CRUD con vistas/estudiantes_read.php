

<!-- HEADER -->

<?php include_once './View/base/header.php';?>

<!-- CONTENT -->

  <div class="container mt-5 d-flex justify-content-end">

    <a href="./estudiantes_create.php"
     class="btn btn-primary">Crear Estudiantes</a>
  </div>
  
  <h1 class="text-center display-4">Tabla Estudiantes</h1>

  <div class="container-fluid d-flex justify-content-center my-5">


    <table class="table text-center">
        <thead class="table-dark">

            <tr>
                <th scope="col">N</th>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CIUDAD</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody id="table">

        <?php

include_once "./controllers/estudiantes_controller.php";

$actas = new ControllerEstudiantes();

$array =json_decode($actas->Read());

#var_dump( $array) ;

$j = 1;


for ($i=0; $i <  count($array); $i++) { 
    echo 
    "<tr><td>" . $j . "</td>"

    . "<td>" . $array[$i]->id . "</td>"

    . "<td>" . $array[$i]->Nombre . "</td>"
    . "<td>" . $array[$i]->Ciudad . "</td>"
    . "<td>" . $array[$i]->Telefono . "</td>"

    . "<td>
     <div class='d-flex justify-content-center'>

    <a href='./estudiantes_delete.php?id=" .$array[$i]->id."' class='btn btn-danger mx-2'>ELIMINAR</a> 

    <a href='./estudiantes_update.php?id=". $array[$i]->id."' class='btn btn-primary mx-2' > EDITAR</a>
  
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