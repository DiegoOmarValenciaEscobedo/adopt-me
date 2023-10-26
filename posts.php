<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Publicaciones</title>
        <link href="css/posts.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
    $query = "SELECT * FROM dogposts WHERE iduser != '$iduser' and adopted = '0';";
    $result = mysqli_query($conex, $query);

    $query2 = "SELECT COUNT(*) AS 'a' FROM dogposts WHERE iduser != '$iduser' and adopted = '0';";
    $existpost = mysqli_query($conex, $query2);
    $numberpost=mysqli_fetch_array($existpost);

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

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1 class="h6 mb-0 text-dark lh-1">Publicaciones</h1>

        <small class="d-block text-end mt-3">
            <a href="myposts.php">Ver mis publicaciones</a>
        </small>
<?php if($numberpost['a'] != 0){ while($fila=mysqli_fetch_array($result)){ ?>

        <div class="d-flex text-muted pt-5">
            <?php echo"<a href='dogdetails.php?idpost=",$fila['idpost'],"'><img src='",$fila['image'],"' height='75px' class='lefticon d-inline-block align-top m-2' alt='",$fila['name'],"'></a>";?>
            <p class="pb-3 mb-0 small lh-sm border-bottom">
                <?php echo"<strong class='d-block text-gray-dark'>",$fila['name'],"</strong>";?>
                <?php echo"<label class='text-gray'>",$fila['description'],"</label>";?>
            </p>
        </div>

<?php }}else{?>
        <br><br><br><br><h3 class="lead text-center  bg-danger p-3 text-white">Aun no hay Publicaciones</h3>
<?php }?>
        
    </div>

</body>