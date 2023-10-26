<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Enviar mensaje</title>
        <link href="css/posts.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $idsour = $_SESSION['iduser'];
    $iddest = $_GET["iddest"];
    $idpost = $_GET["idpost"];
    $query = "SELECT * FROM messages WHERE (idsour = '$idsour' and iddest = '$iddest') or (idsour = '$iddest' and iddest = '$idsour');";
    $result = mysqli_query($conex, $query);

    $query2 = "SELECT COUNT(*) AS 'a' FROM messages WHERE (idsour = '$idsour' and iddest = '$iddest') or (idsour = '$iddest' and iddest = '$idsour');";
    $existmess = mysqli_query($conex, $query2);
    $numbermess=mysqli_fetch_array($existmess);

    $query3 = "SELECT * FROM users WHERE iduser = '$iddest';";
    $result3 = mysqli_query($conex, $query3);
    $user=mysqli_fetch_array($result3);

    $query4 = "SELECT * FROM dogposts WHERE idpost = '$idpost';";
    $result4 = mysqli_query($conex, $query4);
    $posto=mysqli_fetch_array($result4);

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

    <div class="row container-center m-1 p-5 d-block"> 

<?php
    $query5 = "SELECT COUNT(*) AS 'a' FROM requests WHERE iddog = '$idpost' AND idgiver = '$iddest' AND idadopter = '$idsour';";
    $result5 = mysqli_query($conex, $query5);
    $requests=mysqli_fetch_array($result5);

    $query6 = "SELECT COUNT(*) AS 'a' FROM adoptions WHERE iddog = '$idpost' AND idgiver = '$iddest' AND idadopter = '$idsour';";
    $result6 = mysqli_query($conex, $query6);
    $adoptions=mysqli_fetch_array($result6);
?>

        <div class="button-group">
            <a href="messages.php" class="btn btn-dark mx-2">Ver todos los mensajes</a>
<?php
            if($requests['a'] != 0){
                echo"<a class='btn border-warning mx-2' type='button'>En solicitud</a>";
            }else if($adoptions['a'] != 0){
                echo"<a class='btn border-danger mx-2' type='button'>Solicitud aceptada</a>";
            }else{
                echo"<a class='btn btn-success' type='button' href='php/createrequest.php?idgiver=",$iddest,"&idpost=",$idpost,"'>Solicitar adopcion</a>";
            }
?>
            
        </div>

        <?php echo"<br><br><label class='lead '>",$user['name']," ",$user['plastname']," ",$user['mlastname'],"</label><br><br>";?>
        <?php echo"<label class='lead '>Perrito: ",$posto['name'],"</label><br><br>";?>

        <form class="d-inline-block" method="POST">

            <?php if($numbermess['a'] != 0){ while($fila=mysqli_fetch_array($result)){ ?>
            
                <?php if($fila['idsour'] == $idsour){?>

                    <div class='col-5 position-relative start-50 translate-middle-y border-info border rounded my-5 p-2'>
                        <?php echo"<label>",$fila['messtext'],"</label>";?>
                    </div>

                <?php }else{?>

                    <div class='col-5 border-primary border rounded my-5 p-2'>
                        <?php echo"<label>",$fila['messtext'],"</label>";?>
                    </div>

                <?php }?>

            <?php }}else{?>

                <br><br><br><br><h3 class="lead text-center  bg-danger p-3 text-white">Sin mensajes</h3>
            
            <?php }?> 
                
            <br><br><br>
            <div class="p-3">
                
                <input type="text"  placeholder="Mensaje" id="message" name="message" required size="33">
                <button class="mx-3 border-light" type="submit" name="sendmess"><image src="images/send-message-icon.png" width="25px"></button>
            
            </div>

        </form>

<?php
    if(isset($_POST['sendmess'])){

        $messtext = trim($_POST['message']);

        $query = "INSERT INTO messages(messtext, idsour, iddest,idpost) VALUES ('$messtext','$idsour','$iddest','$idpost');";

        $result = mysqli_query($conex, $query);
        
        echo"<script type='text/javascript'>window.location.href='sendmessage.php?iddest=",$iddest,"&idpost=",$idpost,"'; </script>";
    }

?>

    </div>

</body>