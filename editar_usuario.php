<?php


include('includes/config.inc.php');
include('includes/database.inc.php');
include('includes/funciones.inc.php');

seguridad();

include('includes/logedHeader.inc.php');


if (isset($_POST['usuario'])) {

    if ($stm = $conectar->prepare('UPDATE usuario SET usuario = ? , email = ? , activo = ? WHERE idusuario = ? ')) {
        $stm->bind_param('sssi', $_POST['usuario'], $_POST['email'], $_POST['activo'], $_GET['id']);
        $stm->execute();

        $stm->close();

        if (isset($_POST['pass'])) {

            if ($stm = $conectar->prepare('UPDATE usuario SET pass = ? WHERE idusuario = ? ')) {
                $hashed = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $stm->bind_param('si', $hashed, $_GET['id'] );
                $stm->execute();
                $stm->close();
    
            }  else {
    
                echo 'No se pudo ejecutar la solicitud de cambio de contraseña';
        
            }

        }

        set_mensaje("El usuario: " . $_GET['id'] . " ha sido editado correctamente");
        header('Location: usuarios.php');
    
    


    } else {

        echo 'No se pudo ejecutar la solicitud de cambio de usuario';

    }
    



}




if (isset($_GET['id'])) {

    if ($stm = $conectar->prepare('SELECT * FROM usuario WHERE idusuario = ? ')) {
        $stm->bind_param('i', $_GET['id']);
        $stm->execute();

        $resultado = $stm->get_result();
        $usuario = $resultado->fetch_assoc();



        if ($usuario) {

            ?>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-9">

                        <h1 class="display-1 text-center">Editar Usuario</h1>

                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <form method="post">
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control active"
                                                value="<?php echo $usuario['email'] ?>" />
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                        <!-- Usuario input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="usuario" name="usuario" class="form-control active"
                                                value="<?php echo $usuario['usuario'] ?> " />
                                            <label class="form-label" for="usuario">Usuario</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="pass" name="pass" class="form-control" />
                                            <label class="form-label" for="pass">Contraseña</label>
                                        </div>
                                        <!-- Seleccionar Usuairo Activo/Inactivo -->
                                        <div class="form-outline mb-4">
                                            <select name="activo" class="form-select" id="activo">
                                                <option <?php echo ($usuario['activo']) ? "selected" : ""; ?> value="1">Activo
                                                </option>
                                                <option <?php echo ($usuario['activo']) ? "" : "selected"; ?> value="0">Inactivo
                                                </option>
                                            </select>

                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block">Editar Usuario</button>
                                    </form>
                                </div>



                            </div>
                        </div>








                    </div>
                </div>
            </div>


            <?php

        }

        $stm->close();
        die();

    } else {
        echo 'No se pudo ejecutar la sentencia';

    }

} else {
    echo 'No se ha seleccionado ningún usuario';
    die();
}




include('includes/footer.inc.php');


?>