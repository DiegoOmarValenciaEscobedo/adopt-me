<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Publicaciones</title>
        <link href="css/dogdetails.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
    $idpost = $_GET["idpost"];
    $query = "SELECT * FROM dogposts WHERE idpost = '$idpost';";
    $result = mysqli_query($conex, $query);
    $fila=mysqli_fetch_array($result);

    $query2 = "SELECT * FROM users WHERE iduser =(SELECT iduser FROM dogposts WHERE idpost = '$idpost');";
    $result2 = mysqli_query($conex, $query2);
    $fila2=mysqli_fetch_array($result2);
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
                        <a class="nav-link active text-info" aria-current="page" href="posts.php">Publicaciones</a>
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

    <form class="container border shadow-lg" method="POST" action="">
      
        <div id="divLeftElement">
            <?php echo"<img src='",$fila['image'],"' width='400px'>";?>
         </div>

         <div id="divRightElement">
            <?php echo"<br><br><h1>",$fila['name'],"</h1>";?>
            <?php echo"<h5> Raza ",$fila['breed'],"</h5>";?>
            <?php echo"<p class='m-2'>",$fila['description'],"</p>";?>
            <?php echo"<br><p class='m-2'>",$fila['mood'],"</p>";?>
            
            <div id="divLeftElementInCard"> 
                <?php echo"<p>",$fila['age']," años de edad</p>";?>
            </div>

            <div id="divRightElementInCard"> 
                <?php echo"<p>Publicado por: ",$fila2['name']," ",$fila2['plastname'],"</p>";?>
            </div>

            <?php if($fila['iduser'] != $iduser) echo"<a class='btn btn-success' type='button' href='sendmessage.php?iddest=",$fila['iduser'],"&idpost=",$idpost,"'>Me interesa</a>";?>

        </div>

    </form>


</body>