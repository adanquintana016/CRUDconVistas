<!-- HEADER -->

<?php require_once './View/base/header.php';?>



<div class="container mt-5">
        <form action="./reporte_generado.php" method="post">

            <h4 class="display-3 text-center mt-3">Búsqueda por Fecha</h4>

            <p> <strong>
                    Fecha comienzo: 
                </strong> 
            </p>
            
            <input class="form-control mb-3" type="date"  name="fecha_ini"  > 

            <p> <strong>
                    Fecha Final: 
                </strong> 
            </p>


            <input class="form-control mb-3" type="date" name="fecha_fin"><br />

            
            <input class="btn btn-primary" type="submit"  value="Generar Reporte"><br>

        </form>
    </div>



<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>