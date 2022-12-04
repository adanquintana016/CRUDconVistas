
<!-- HEADER -->

<?php include_once './View/base/header.php';?>

<!-- CONTENT -->


    <div class="container mt-5 ">
        
  

        <form action="./ruteador.php?controller=notas&action=create" method="POST" enctype="multipart/form-data">

            <h4 class="mb-3 text-center display-4">Crear Notas</h4>


          
        <input class="form-control mb-3" type="text" name="nombre" placeholder="nombre"  required>

       
        <input class="form-control mb-3" type="number" name="nota"  placeholder="nota" required>

        <strong>
            Ingreso Nota

        </strong>
        <input class="form-control mb-3" type="date" name="ingreso_nota"  required>


        <strong>

            Consulta Nota
        </strong>

        <input class="form-control mb-3" type="date" name="consulta_nota"  required>

        <input class="form-control mb-3" type="number" name="corte"  placeholder="corte" required>

        <input class="form-control mb-3" type="text" name="materia" placeholder="materia"   required>

        <input class="form-control mb-3" type="email" name="email" placeholder="Correo Electronico" placeholder="correo"  required>

        <input class="form-control mb-3" type="number" name="id_estudiante"  placeholder="id estudiante" required>

        <input  type="submit" name="guardar" value="Crear Nota" class="btn btn-primary my-2">       

        </form>

    </div>

<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>