<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Mis mensajes</title>
        <link href="css/posts.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
    $query = "SELECT * FROM messages WHERE idsour = '$iduser' or iddest = '$iduser' GROUP BY idpost;";
    $result = mysqli_query($conex, $query);

    $query2 = "SELECT COUNT(*) AS 'a' FROM messages WHERE idsour = '$iduser' or iddest = '$iduser';";
    $existmess = mysqli_query($conex, $query2);
    $numbermess=mysqli_fetch_array($existmess);

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
                        <a class="nav-link active" aria-current="page" href="ahome.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-info" aria-current="page" href="aposts.php">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aproducts.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="ausers.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="avets.php">Veterinarias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="adoptions.php">Adopciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aprofile.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-warning" aria-current="page" href="amessages.php">Mensajes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="php/exit.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>

        </div>
    
    </nav>

        <div class="row container-center m-1 p-5 d-block">  
            <label class="lead">Mensajes</label>
<?php if($numbermess['a'] != 0){ while($fila=mysqli_fetch_array($result)){ 

            $aux1= $fila['idsour'];
            $query4 = "SELECT * FROM users WHERE iduser = '$aux1';";
            $dest = mysqli_query($conex, $query4);
            $destdate=mysqli_fetch_array($dest);

            $aux2= $fila['iddest'];
            $query5 = "SELECT * FROM users WHERE iduser = '$aux2';";
            $dest2 = mysqli_query($conex, $query5);
            $destdate2=mysqli_fetch_array($dest2);
?>    
    <?php if($fila['idsour'] == $iduser){ ?>
            <div class="d-flex text-muted p-1 m-3 border border-primary rounded-pill">
                <?php echo"<a href='sendmessage.php?iddest=",$fila['iddest'],"&idpost=",$fila['idpost'],"'><strong class='d-block text-gray-dark'>",$destdate2['name']," ",$destdate2['plastname']," ",$destdate2['mlastname'],"</strong></a>";?>
            </div>
    <?php }else{ ?>
            <div class="d-flex text-muted p-1 m-3 border border-primary rounded-pill">
                <?php echo"<a href='sendmessage.php?iddest=",$fila['idsour'],"&idpost=",$fila['idpost'],"'><strong class='d-block text-gray-dark'>",$destdate['name']," ",$destdate['plastname']," ",$destdate['mlastname'],"</strong></a>";?>
            </div>
    <?php } ?>

<?php }}else{ ?>

            <br><br><br><br><h3 class="lead text-center  bg-danger p-3 text-white">Sin mensajes</h3>
            
<?php } ?> 
        

        </div>

</body>