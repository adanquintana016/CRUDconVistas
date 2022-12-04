<!-- HEADER -->

<?php
include_once './View/base/header.php';

include_once './controllers/notas_controller.php';

$controller = new ControllerNotas;

$array = json_decode($controller->notasId());

#var_dump($array);

?>


<div class="container mt-5 ">

    <form action="./ruteador.php?controller=notas&action=update" method="POST" enctype="multipart/form-data">

        <h4 class="mb-3 text-center">Editar Notas</h4>


        <p><strong>Nombre</strong></p>
        
        <input class="form-control mb-3" type="text" name="nombre" placeholder="nombre" value="<?php echo $array->nombre ?>"  required>

        <p><strong>Nota</strong></p>
        <input class="form-control mb-3" type="number" name="nota" placeholder="nota"value="<?php echo $array->nota ?>"required>

       
        <p><strong>Corte</strong></p>
        <input class="form-control mb-3" type="number" name="corte"  placeholder="corte" value="<?php echo $array->corte ?>" required>

        <strong>
        INGRESO_NOTA

        </strong>
        <input class="form-control mb-3" type="date" name="ingreso_nota" value="<?php echo $array->ingreso_nota ?>" required>


        <strong>

        CONSULTA_NOTA
        </strong>

        <input class="form-control mb-3" type="date" name="consulta_nota" value="<?php echo explode(' ',$array->consulta_nota)[0]  ?>" required>

        <p><strong>MATERIA</strong></p>
        <input class="form-control mb-3" type="text" name="materia"  placeholder="materia" value="<?php echo $array->materia ?>" required>

        <p><strong>ID ESTUDIANTE</strong></p>
        <input class="form-control mb-3" type="number" name="id_estudiante" placeholder="id estudiante"  value="<?php echo $array->data_fk->id ?>" required>

        <p><strong>EMAIL</strong></p>
        <input class="form-control mb-3" type="email" name="email" placeholder="Correo Electronico" placeholder="correo"  value="<?php echo $array->EMAIL ?>" required>

        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

        <input type="submit" name="guardar" value="Editar Notas" class="btn btn-primary my-2">
    </form>

</div>


<!-- FOOTER -->

<?php include_once './View/base/footer.php'; ?>