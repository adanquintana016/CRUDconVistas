<!-- HEADER -->

<?php require_once './View/base/header.php';?>


<div class="container-fluid mt-5">

    <h4 class="display-3 text-center mt-3">Reporte por Fecha Ingreso</h4>

        <table class="table table-dark table-striped mt-3">
        <thead>
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
 
            </tr>
          
        </thead>
        <tbody>


        <?php
            require_once './controllers/reporte_controller.php';

            $rep = new ControllerReporte();

            $array = json_decode($rep->generar());

                        
            $j = 1;

            #var_dump($array);


          

for ($i=0; $i <  count($array); $i++) { 
    echo 
    "<tr><td>" . $j . "</td>"

    . "<td>" . $array[$i]->id . "</td>"

    . "<td>" . $array[$i]->nombre . "</td>"

    . "<td>" . $array[$i]->ingreso_nota . "</td>"
    . "<td>" . $array[$i]->consulta_nota . "</td>"
    . "<td>" . $array[$i]->nota . "</td>"
    
    . "<td>" . $array[$i]->corte . "</td>"
    
    . "<td>" . $array[$i]->materia . "</td>"
    
    . "<td>" . $array[$i]->email . "</td>"
    
        
    . "<td>" . $array[$i]->id_estudiante . "</td>" . "</td>";
                $j++;
            }

        ?>

        


        </tbody>
    </table>
</div>






<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>