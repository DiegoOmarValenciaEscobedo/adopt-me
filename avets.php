<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Administrar Veterinarias</title>
        <link href="css/createpost.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
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

<?php
    if(isset($_POST['postvet'])){

        $name = trim($_POST['name']);
        $address = trim($_POST['address']);
        $manager = trim($_POST['manager']);
        $mapslink = trim($_POST['mapslink']);

        $query = "INSERT INTO vets (name, address, managername, mapslink) VALUES ('$name','$address','$manager','https://www.google.com/maps/embed/v1/search?key=AIzaSyBrWdjHw7OFNYvkTZkQiVuEm17blRgqyJk&q=$mapslink+morelia');";

        $result = mysqli_query($conex, $query);
        
        if ($result){
            echo"<script type='text/javascript'>alert('La veterinaria se ha registrado'); window.location.href='avets.php'; </script>";
        }else{
            echo"<script type='text/javascript'>alert('Algunos datos no fueron ingresados correctamente');</script>";
        }
    }

?>

    <form class="row px-4 py-5 my-5 text-center border shadow-lg" method="post">
        <div class="col-10 mx-auto p-3">
            <label class="lead">Registro de Veterinarias</label>
        </div>

        <div class="col-10 mx-auto p-3">
            <a class="btn btn-dark btn-sm mx-5" href="seevets.php">Ver Veterinarias</a>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Nombre del perrito" id="name" name="name" required>
            <label for="name">Nombre del negocio</label>
        </div>
        
        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Direccion del negocio" id="address" name="address"  required>
            <label for="address">Direccion del negocio</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Nombre del encargado" id="manager" name="manager" required>
            <label for="manager">Nombre del encargado</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Link (Nombre del negocio, pero en ves de espacios usa +)" id="mapslink" name="mapslink" required>
            <label for="mapslink">Link (Nombre del negocio, pero en ves de espacios usa +)</label>
        </div>

        <div class="form-floating col-8 mx-auto p-3">
            <br><br><button type="submit" class="btn btn-primary" colspan="2" name="postvet">Registrar Veterinaria</button>
        </div>

    </form>

</body>