<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Mis adopciones</title>
        <link href="css/uhome.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
    $query = "SELECT * FROM adoptions WHERE idadopter = '$iduser';";
    $result = mysqli_query($conex, $query);

    $query2 = "SELECT COUNT(*) AS 'a' FROM adoptions WHERE idadopter = '$iduser';";
    $existadoptions= mysqli_query($conex, $query2);
    $numberadoptions=mysqli_fetch_array($existadoptions);

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

<?php if($numberadoptions['a'] != 0){ while($fila=mysqli_fetch_array($result)){ ?>

        <?php $aux = $fila['iddog'];?>
        <?php $query3 = "SELECT * FROM dogposts WHERE idpost = '$aux';"; ?>
        <?php $result3 = mysqli_query($conex, $query3); ?>
        <?php $fila3=mysqli_fetch_array($result3); ?>

        <div class="d-flex text-muted pt-5">
            <?php echo"<img src='",$fila3['image'],"' height='45' class='lefticon d-inline-block align-top m-2' alt='",$fila3['name'],"'>";?>
            <p class="pb-3 mb-0 small lh-sm border-bottom">
                <?php echo"<label class=' text-gray-dark'><strong>Perrito adoptado:  </strong>",$fila3['name'],"</label>";?>

                <?php $aux = $fila['idadopter'];?>
                <?php $query3 = "SELECT * FROM users WHERE iduser = '$aux';"; ?>
                <?php $result3 = mysqli_query($conex, $query3); ?>
                <?php $fila3=mysqli_fetch_array($result3); ?>
                
                <?php $aux = $fila['idgiver'];?>
                <?php $query3 = "SELECT * FROM users WHERE iduser = '$aux';"; ?>
                <?php $result3 = mysqli_query($conex, $query3); ?>
                <?php $fila3=mysqli_fetch_array($result3); ?>
                <?php echo"<br><label class='text-gray-dark'><strong>Usuario que dio en adopcion:  </strong>",$fila3['name'],"  ",$fila3['plastname'],"  ",$fila3['mlastname'],"</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Domicilio: </strong>",$fila3['street']," # ",$fila3['housen'],", ",$fila3['col'],"";?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo"<a class='btn btn-success p-2 m-1' href='sendevidence.php?idadoption=",$fila['idadoption'],"' name='change'>Enviar evidencias</a>";?>
                <?php echo"<a class='btn btn-dark p-2 m-1' href='seemydevidence.php?idadoption=",$fila['idadoption'],"' name='change'>Ver mis evidencias</a>";?>

                <?php $aux = $fila['idadmin'];?>
                <?php $query3 = "SELECT * FROM users WHERE iduser = '$aux';"; ?>
                <?php $result3 = mysqli_query($conex, $query3); ?>
                <?php $fila3=mysqli_fetch_array($result3); ?>
                <?php echo"<br><br><label class='text-gray-dark'><strong>Administrador que aprobo:  </strong>",$fila3['name'],"  ",$fila3['plastname']," ";?>

            </p>
        </div>

<?php }}else{?>

        <br><br><br><br><h3 class="lead text-center  bg-danger p-3 text-white">No hay publicaciones hechas</h3>
        
<?php }?>

</body>