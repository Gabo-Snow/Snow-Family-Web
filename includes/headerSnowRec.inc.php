<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snow Family</title>
    <link rel="icon" href="../img/logosnowfamily.svg" type="image/x-icon">
    <meta name="msvalidate.01" content="6BEBCD79CDDB8F9526EC9DCBCD12F9F2" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <link href="css/player.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>


</head>
<!-- Background image -->

<body>
    <div class="bg-image" style="
    background-image: url('img/fondo.png');
    min-height: 100vh; 
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    overflow-y: hidden;">

        <div class="mask"
            style=" backdrop-filter: blur(4px); background-color: rgba(102,102,102,0.4); overflow-y: auto;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-black">
                <div class="container-fluid">
                    <a class="navbar-brand active hover-zoom" href="../index.php"><img class="active img-fluid float-none" src="img/logosnowfamily.svg" width="35px"></img></a>
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ">
                            <li class="nav-item me-3 me-lg-1 active">
                                <a class="nav-link hover-zoom" href="https://www.facebook.com/snowfamily/" target="_blank"
                                    rel="noopener noreferrer"><span><i class="fab fa-facebook-f fa-lg"></i></span></a>
                            </li>
                            <li class="nav-item me-3 me-lg-1 active">
                                <a class="nav-link" href="https://www.instagram.com/snowfamily562/" target="_blank"
                                    rel="noopener noreferrer"><span><i class="fab fa-instagram fa-lg"></i></span></a>
                            </li>

                            <li class="nav-item me-3 me-lg-1 active">
                                <a class="nav-link" href="https://www.youtube.com/@SnowFamily" target="_blank"
                                    rel="noopener noreferrer"><span><i class="fab fa-youtube fa-lg"></i></span></a>
                            </li>

                            <li class="nav-item me-3 me-lg-1 active">
                                <a class="nav-link" href="https://wa.me/56995624723" target="_blank"
                                    rel="noopener noreferrer"><span><i class="fab fa-whatsapp fa-lg"></i></span></a>
                            </li>
                            <li class="nav-item me-3 me-lg-1 active">
                                <a class="nav-link" href="mailto:contacto@snowfamily.cl" target="_blank"
                                    rel="noopener noreferrer"><span><i class="fas fa-envelope fa-lg"></i></span></a>
                            </li>


                        </ul>
                    </div>

                </div>

            </nav>

            <?php get_mensaje(); ?>