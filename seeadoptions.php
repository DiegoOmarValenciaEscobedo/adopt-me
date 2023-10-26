<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Gestionar Publicaciones</title>
        <link href="css/myposts.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
    $query = "SELECT * FROM adoptions;";
    $result = mysqli_query($conex, $query);

    $query2 = "SELECT COUNT(*) AS 'a' FROM adoptions;";
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
                        <a class="nav-link active" aria-current="page" href="ahome.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aposts.php">Publicaciones</a>
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
                        <a class="nav-link active text-info" aria-current="page" href="adoptions.php">Adopciones</a>
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

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1 class="h6 mb-0 text-dark lh-1 p-3">Publicaciones</h1>

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
                <?php echo"<br><label class='text-gray-dark'><strong>Usuario que adopto:  </strong>",$fila3['name'],"  ",$fila3['plastname'],"  ",$fila3['mlastname'],"</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Domicilio: </strong>",$fila3['street']," # ",$fila3['housen'],", ",$fila3['col'],"";?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo"<a class='btn btn-success p-2 m-1' href='seeeachevidence.php?idadoption=",$fila['idadoption'],"' name='change'>Ver evidencias</a>";?>
                
                <?php $aux = $fila['idgiver'];?>
                <?php $query3 = "SELECT * FROM users WHERE iduser = '$aux';"; ?>
                <?php $result3 = mysqli_query($conex, $query3); ?>
                <?php $fila3=mysqli_fetch_array($result3); ?>
                <?php echo"<br><label class='text-gray-dark'><strong>Usuario que dio en adopcion:  </strong>",$fila3['name'],"  ",$fila3['plastname'],"  ",$fila3['mlastname'],"</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Domicilio: </strong>",$fila3['street']," # ",$fila3['housen'],", ",$fila3['col'],"";?>

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
        
    </div>

</body>