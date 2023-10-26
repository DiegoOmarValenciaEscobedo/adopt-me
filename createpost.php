<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Publicar</title>
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
                        <a class="nav-link active" aria-current="page" href="uhome.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="posts.php">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-info" aria-current="page" href="createpost.php">Publicar</a>
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

<?php
    if(isset($_POST['postit']) && isset($_FILES['dogimage']['name'])){

        $name = trim($_POST['name']);
        $breed = trim($_POST['breed']);
        $age = trim($_POST['age']);
        $mood = trim($_POST['mood']);
        $description = trim($_POST['description']);
        $imagename = $_FILES['dogimage']['name'];
        $opath = $_FILES['dogimage']['tmp_name'];
        $dpath = "dogimages/".$imagename;
        copy($opath, $dpath);

        $query = "INSERT INTO dogposts(name, breed, age, mood, description, image, iduser, adopted) VALUES ('$name','$breed','$age','$mood','$description','$dpath','$iduser','0');";

        $result = mysqli_query($conex, $query);
        
        if ($result){
            echo"<script type='text/javascript'>window.location.href='successfulpost.html'; </script>";
        }else{
            echo"<script type='text/javascript'>alert('Algunos datos no fueron ingresados correctamente'); window.location.href='createpost.php'; </script>";
        }
    }

?>

    <form class="row px-4 py-5 my-5 text-center border shadow-lg" method="post" enctype="multipart/form-data">
        <div class="col-10 mx-auto p-3">
            <label class="lead" name="username">Registro de perrito en adopcion</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Nombre del perrito" id="name" name="name" required>
            <label for="name">Nombre del perrito</label>
        </div>
        
        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Raza" id="breed" name="breed"  required>
            <label for="breed">Raza</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Edad" id="age" name="age" required>
            <label for="age">Edad</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="tel" class="form-control inpustStyle" placeholder="Caracter" id="mood" name="mood" required>
            <label for="mood">Caracter</label>
        </div>

        <div class="form-floating col-10 mx-auto p-3">
            <input type="tel" class="form-control inpustStyle" placeholder="Descripcion" id="description" name="description" required>
            <label for="desc">Descripcion</label>
        </div>

        <div class="col-8 mx-auto p-3">
            <label for="dogimage" class="text-primary lead p-2">Imagen del cachorro</label><br>
            <input type="file" id="dogimage" name="dogimage" accept="image/png, image/jpeg , image/jpg , image/png" required>
        </div>

        <div class="form-floating col-8 mx-auto p-3">
            <br><br><button type="submit" class="btn btn-primary" colspan="2" name="postit">Publicar</button>
        </div>

    </form>


</body>