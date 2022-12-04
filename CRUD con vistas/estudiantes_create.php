
<!-- HEADER -->

<?php include_once './View/base/header.php';?>

<!-- CONTENT -->


    <div class="container mt-5 ">
        
  

        <form action="./ruteador.php?controller=estudiantes&action=create" method="POST" enctype="multipart/form-data">

            <h4 class="mb-3 text-center display-4">Crear Estudiantes</h4>


            <input class="form-control mb-3" type="text" name="nombre" placeholder="nombre"  required>


            
            <input class="form-control mb-3" type="text" name="ciudad" placeholder="ciudad"  required>
            
            <input class="form-control mb-3" type="number" name="telefono" placeholder="telefono"  required>

            <input  type="submit" name="guardar" value="Crear Estudiante" class="btn btn-success my-2">       

        </form>

    </div>

<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>