<!-- HEADER -->

<?php 
include_once './View/base/header.php';

include_once './controllers/estudiantes_controller.php';

$controller = new ControllerEstudiantes();

$array = json_decode($controller->estudiantesId());

?>


<div class="container mt-5 ">

        <form action="./ruteador.php?controller=estudiantes&action=update" method="POST" enctype="multipart/form-data">

            <h4 class="mb-3 text-center display-4 ">Editar Estudiantes</h4>

            <p><strong>Nombre</strong></p>
            <input class="form-control mb-3" type="text" name="nombre" placeholder="" value="<?php echo $array->Nombre ?>" required>

            <p><strong>Ciudad</strong></p>
            <input class="form-control mb-3" type="text" name="ciudad" placeholder="" value="<?php echo $array->Ciudad ?>" required>

         
            <p><strong>Telefono</strong></p>
            <input class="form-control mb-3" type="number" name="telefono" placeholder="" value="<?php echo $array->Telefono ?>" required>


            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">


            <input  type="submit" name="guardar" value="Editar Estudiante" class="btn btn-success my-2">       
        </form>

    </div>



<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>