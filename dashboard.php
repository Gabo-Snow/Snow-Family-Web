<?php


include('includes/config.inc.php');
include('includes/database.inc.php');
include('includes/funciones.inc.php');

seguridad();

include('includes/logedHeader.inc.php');




?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="display-1">Panel</h1>
            <a href="usuarios.php">Gestión de Usuarios</a>
            <a href="posts.php">Posts de Usuarios</a>

        </div>
    </div>
</div>

<?php


include('includes/footer.inc.php');


?>