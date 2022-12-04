<!-- HEADER -->

<?php include_once './View/base/header.php';?>


<div class="container mt-5">

<h3 class="display-4 text-center text-danger">ELIMNAR ESTUDIANTES POR ID</h3>

<form action="./ruteador.php?controller=estudiantes&action=delete" method="post">

<input class="form-control mb-3" type="number" name="id" placeholder="id estudiantes" value="<?php echo $_GET['id'] ?>">

<input class="btn btn-danger form-control" type="submit" value="delete">

</form>


</div>



<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>