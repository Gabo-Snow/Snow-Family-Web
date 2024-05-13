<?php


include('includes/config.inc.php');
include('includes/database.inc.php');
include('includes/funciones.inc.php');

seguridad();

include('includes/logedHeader.inc.php');



if (isset($_POST['usuario'])) {
  
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT email FROM usuario WHERE email = '$email'";
        $resultado = mysqli_query($conectar, $sql);
        if (mysqli_num_rows($resultado) > 0) {
            // Asignar el mensaje de error usando set_mensaje
            set_mensaje("El email " . $email . " ya se encuentra registrado, por favor ingresa otro");
        } else {
            

            if ($stm = $conectar->prepare('INSERT INTO usuario (usuario, email, pass, activo) VALUES(?,?,?,?)')) {
                $hashed = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $stm->bind_param('ssss', $_POST['usuario'], $_POST['email'], $hashed, $_POST['activo']);
                $stm->execute();

                // Asignar el mensaje de éxito usando set_mensaje
                set_mensaje("El nuevo usuario: " . $_POST['usuario'] . " ha sido agregado correctamente");
                header('Location: usuarios.php');
                die();

            } else {

                echo 'No se pudo ejecutar la sentencia';

            }

        }



    }

}

// Mostrar el mensaje usando get_mensaje
echo get_mensaje();




?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <h1 class="display-1 text-center">Agregar Usuario</h1>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form method="post">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control" required />
                                <label class="form-label" for="email">Email</label>
                            </div>
                            <!-- Usuario input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="usuario" name="usuario" class="form-control" required />
                                <label class="form-label" for="usuario">Usuario</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="pass" name="pass" class="form-control" required />
                                <label class="form-label" for="pass">Contraseña</label>
                            </div>
                            <!-- Seleccionar Usuairo Activo/Inactivo -->
                            <div class="form-outline mb-4">
                                <select name="activo" class="form-select" id="activo">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>

                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Agregar Usuario</button>
                        </form>
                    </div>



                </div>
            </div>








        </div>
    </div>
</div>


<?php




include('includes/footer.inc.php');


?>