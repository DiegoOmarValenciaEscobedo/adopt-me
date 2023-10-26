<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Inicio</title>
        <link href="css/uhome.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

<body>

    <?php
        session_start();
        include("php/connection.php");
        $iduser = $_SESSION['iduser'];
        $query = "SELECT * from USERS WHERE iduser ='$iduser'";
        $result = mysqli_query($conex, $query);
        $array = mysqli_fetch_array($result);
    ?>

    <nav class="navbar navbar-expand-xl navbar-light bg-light " aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <h1 class="navbar-brand" href="#">Adopt - Me |</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-info" aria-current="page" href="uhome.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="posts.php">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="createpost.php">Publicar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="products.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="vetsnear.html">Cerca de mi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aboutus.html">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php">Mi perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-warning" aria-current="page" href="messages.php">Mensajes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="php/exit.php">Cerrar sesion</a>
                    </li>
                </ul>
                <a class="navbar-brand" href="shoppingcar.php"><img src="images/sc.png" width="30px" class="lefticon d-inline-block align-top" alt="Logo Adopt-Me"></a>
            </div>

        </div>
    
    </nav>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/carrousel4.jpeg" width="200px">
            </div>
              
            <div class="carousel-item">
                <img src="images/carrousel1.jpeg" width="200px">
            </div>
              
            <div class="carousel-item">
                <img src="images/carrousel2.jpeg" width="200px">
            </div>
            <div class="carousel-item">
                <img src="images/carrousel3.jpeg" width="200px">
            </div>
            
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="px-4 py-5 my-5 text-center border shadow-lg">
        <img class="d-block mx-auto mb-4" src="images/huella.png" alt="" width="100" height="100">
<?php
        echo"<h1 class='display-5 fw-bold'>Bienvenido ",$array['name']," ",$array['plastname'],"</h1>";
?>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Ayudanos a darle un hogar a alguno de nuestros perritos que tenemos en adopcion</p>
            <p class="lead mb-4">La vida es mejor en compañia de una mascota</p>
            <p class="lead mb-4">Informate mas acerca de nosotros</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a class="btn btn-primary btn-lg px-4 gap-3" href="aboutus.html">Conocer mas</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">Sabemos que el cuidado de tu mascota tambien es importante</h1>
            <p class="lead">Por eso en Adopt-Me tenemos convenio con medicos veterinarios para que en nuestra aplicacion encuentres todo lo necesario para darle los cuidados necesarios a tu mascota</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <a type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" href="products.html">Ver productos</a>
            </div>
        </div>
            <div class="col-lg-4 offset-lg-0 p-0 overflow-hidden">
                <img class="rounded-lg-3" src="images/pet-care.jpg" alt="" width="390">
            </div>
        </div>
    </div>

</body>