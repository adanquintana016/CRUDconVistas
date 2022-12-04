<!-- HEADER -->

<?php include_once './View/base/header.php';?>


<div class="container mt-5 ">

<h3 class="display-4 text-center text-danger display-4">ELIMINAR NOTAS POR ID</h3>

<form  action="./ruteador.php?controller=notas&action=delete" method="post">

<STRONG>ID NOTAS A ELIMINAR</STRONG>

<input class="form-control my-3" type="number" name="id" placeholder="id autor" value="<?php echo $_GET['id'] ?>">

<input class="form-control btn btn-danger" type="submit" value="delete">

</form>


</div>



<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>