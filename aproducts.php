<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Administrar productos</title>
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
                        <a class="nav-link active text-info" aria-current="page" href="aproducts.php">Productos</a>
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

<?php
    if(isset($_POST['postit']) && isset($_FILES['prodimage']['name'])){

        $name = trim($_POST['name']);
        $price = trim($_POST['price']);
        $stock = trim($_POST['stock']);
        $description = trim($_POST['description']);
        $vet = trim($_POST['vets']);
        $imagename = $_FILES['prodimage']['name'];
        $opath = $_FILES['prodimage']['tmp_name'];
        $dpath = "productimages/".$imagename;
        copy($opath, $dpath);

        $query = "INSERT INTO products (name, description, price, image, stock, idvet) VALUES ('$name','$description','$price','$dpath','$stock','$vet');";

        $result = mysqli_query($conex, $query);
        
        if ($result){
            echo"<script type='text/javascript'>alert('El producto se ha registrado'); window.location.href='aproducts.php'; </script>";
        }else{
            echo"<script type='text/javascript'>alert('Algunos datos no fueron ingresados correctamente');</script>";
        }
    }

?>

    <form class="row px-4 py-5 my-5 text-center border shadow-lg" method="post" enctype="multipart/form-data">
        <div class="col-10 mx-auto p-3">
            <label class="lead">Registro de productos</label>
        </div>

        <div class="col-10 mx-auto p-3">
            <a class="btn btn-dark btn-sm mx-5" href="seeproducts.php">Ver productos</a>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Nombre del perrito" id="name" name="name" required>
            <label for="name">Nombre del producto</label>
        </div>
        
        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Descripcion del producto" id="description" name="description"  required>
            <label for="description">Descripcion del producto</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Precio" id="price" name="price" required>
            <label for="price">Precio</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="number" class="form-control inpustStyle" placeholder="Productos en existencia" id="stock" name="stock" required>
            <label for="stock">Productos en existencia</label>
        </div>

        <div class="col-8 mx-auto p-3">
            <label for="prodimage" class="text-primary lead p-2">Imagen del producto</label><br>
            <input type="file" id="prodimage" name="prodimage" accept="image/png, image/jpeg , image/jpg , image/png" required>
        </div>

        <div class="col-8 mx-auto p-3">
            <label for="vets" class="p-2">Veterinaria que lo vende</label><br>
            <select name="vets">
<?php
            $query2 = "SELECT * FROM vets;";
            $vets = mysqli_query($conex, $query2);
          
            while($eachvet=mysqli_fetch_array($vets)) {
                echo "<option value='",$eachvet['idvet'],"'>$eachvet[name]</option>";
            }
?>
            </select>
        </div>

        <div class="form-floating col-8 mx-auto p-3">
            <br><br><button type="submit" class="btn btn-primary" colspan="2" name="postit">Subir producto</button>
        </div>

    </form>

</body>