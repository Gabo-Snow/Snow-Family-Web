<?php

function seguridad()
{
    if (!isset($_SESSION['idusuario'])) {
        echo "Por favor inicia sesión para entrar aquí";
        header('Location: /cms');
        die();

    }
}

function logeado()
{
    if (!isset($_SESSION['idusuario'])) {
        echo '<a type="button" class="btn btn-primary me-3" href="/cms/login.php">
        Iniciar Sesión
        </a>';
    }
    else {

        echo '<a type="button" class="btn btn-primary me-3" href="/cms/dashboard.php">
        Panel
        </a>';
    }

}

function set_mensaje($mensaje)
{ {
        $_SESSION['mensaje'] = $mensaje;
    }
}

function get_mensaje()
{ {
        if (isset($_SESSION['mensaje'])) {

            echo '<p>' . $_SESSION['mensaje'] . '</p> <hr>';
            unset($_SESSION['mensaje']);
        }

    }
}


?>
