<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Mis evidencias</title>
        <link href="css/products.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

    <?php
        session_start();
        include("php/connection.php");
        $iduser = $_SESSION['iduser'];
        $idadoption = $_GET["idadoption"];
        $query = "SELECT * from evidence WHERE idadoption = '$idadoption'";
        $result = mysqli_query($conex, $query);

        $query2 = "SELECT COUNT(*) AS 'a' from evidence WHERE idadoption = '$idadoption'";
        $result2 = mysqli_query($conex, $query2);
        $existevidence=mysqli_fetch_array($result2);
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
                        <a class="nav-link active" aria-current="page" href="uhome.php">Inicio</a>
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
                        <a class="nav-link active text-info" aria-current="page" href="profile.php">Mi perfil</a>
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
    

    <div class="row grid-container text-center">
        
<?php if($existevidence['a'] !=0){while($fila=mysqli_fetch_array($result)){ ?>

            <div class="col-5 text-muted pt-5">
                <?php echo"<img src='",$fila['Image'],"' width='420px'>";?>
                <?php echo"<br><label class=''>",$fila['description'],"</label>";?>
            </div>
        </a>

<?php }}else{?>
        <br><br><br><br><h3 class="lead text-center  bg-danger p-3 text-white">No ha subido evidencias</h3>
<?php } ?>
    </div>

</body>