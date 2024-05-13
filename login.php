<?php


include ('includes/config.inc.php');
include ('includes/database.inc.php');
include ('includes/funciones.inc.php');

include ('includes/header.inc.php');



if (isset($_POST['email'])) {

  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  if ($email) {
    try {
      $stmt_usuario = $conectar->prepare('SELECT * FROM usuario WHERE email = ? AND activo = 1');
      $stmt_usuario->bind_param('s', $email);
      $stmt_usuario->execute();
      $resultado = $stmt_usuario->get_result();
      $usuario = $resultado->fetch_object();
      $stmt_usuario->close();

      if (password_verify($_POST['pass'], $usuario->pass)) {
        $_SESSION['idusuario'] = $usuario->idusuario;
        $_SESSION['email'] = $usuario->email;
        $_SESSION['usuario'] = $usuario->usuario;

        set_mensaje("Bienvenido señor " . $_SESSION['usuario']); //agregar función para que cambie de título entre maestro, ingenmiero, doctor, etc. xd

        header('Location: dashboard.php');

        die();
      } else {

        echo 'No te pudiste logear';

      }
    } catch (Exception $e) {

      echo 'Error: ' . $e->getMessage();
    }
  } else {

    echo 'El email no es válido';
  }
}


?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <form method="post">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="email" name="email" class="form-control" required />
          <label class="form-label" for="email">Email</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="pass" name="pass" class="form-control" required />
          <label class="form-label" for="pass">Contraseña</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Recuérdame</label>
            </div>
          </div>

          <div class="col">
            <!-- Simple link -->
            <a href="#!">Recupera tu contraseña</a>
          </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
      </form>
    </div>



  </div>
</div>

<?php


include ('includes/footer.inc.php');


?>