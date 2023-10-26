<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Veterinarias</title>
        <link href="css/posts.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    $query = "SELECT * FROM vets;";
    $result = mysqli_query($conex, $query);

    $query2 = "SELECT COUNT(*) AS 'a' FROM vets;";
    $existvets = mysqli_query($conex, $query2);
    $numbervets=mysqli_fetch_array($existvets);

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
                        <a class="nav-link active text-info" aria-current="page" href="avets.php">Veterinarias</a>
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

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1 class="h6 mb-0 text-dark lh-1">Veterinarias</h1>
<?php if($numbervets['a'] != 0){ while($fila=mysqli_fetch_array($result)){ ?>

        <div class="d-flex text-muted pt-5 text-center">
            <?php echo"<img src='images/vet-icon.png' height='38' class='lefticon d-inline-block align-top m-2' alt='Veterinarias'>";?>
            <p class="pb-3 mb-0 small lh-sm border-bottom ">
                <?php echo"<strong class='d-block text-gray-dark'>",$fila['name'],"</strong>";?>
                <?php echo"<label class='text-gray'>Encargado:  ",$fila['managername'],"</label>";?>
                <?php echo"<br><label class='text-gray'>",$fila['address'],"</label>";?>
                <?php echo"<br><a class='btn btn-danger float-right p-1' href='php/deletevet.php?idvet=",$fila['idvet'],"' name='delete'>Eliminar Veterinaria</a>";?>
            </p>
        </div>

<?php }}else{?>
        <br><br><br><br><h3 class="lead text-center  bg-danger p-5 text-white">Aun no hay Usuarios registrados</h3>
<?php }?>
        
    </div>

</body>