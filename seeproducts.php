<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Productos</title>
        <link href="css/products.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    $query = "SELECT * FROM products;";
    $result = mysqli_query($conex, $query);

    $query2 = "SELECT COUNT(*) AS 'a' FROM products;";
    $existprod = mysqli_query($conex, $query2);
    $numberprod=mysqli_fetch_array($existprod);

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

    <div class="grid-container">
        
<?php if($numberprod['a'] != 0){ while($fila=mysqli_fetch_array($result)){ ?>

        <?php echo"<a href='productsdetails.php?idproduct=",$fila['idproduct'],"' class='item-container'>";?>
            <div class="grid-item">
                
                <div class="item-info">
                    <?php echo"<img src='",$fila['image'],"' width='100px'>";?>
                    <?php echo"<label class='title-item'>",substr($fila['name'], 0, 20),"...</label>";?>
                    <div class='amout-price-end'>
                        <?php echo"<label class='amount-item'>",$fila['stock']," disponibles</label>";?>
                        <?php echo"<br><a class='btn btn-success btn-sm' href='php/moreprod.php?idproduct=",$fila['idproduct'],"'>+</a>";?>
                        <?php echo"<a class='btn btn-warning btn-sm' href='php/lessprod.php?idproduct=",$fila['idproduct'],"'>-</a>";?>
                        <?php echo"<br><label class='price-item'> $",$fila['price'],"</label>";?>
                    </div>
                    <?php echo"<br><a class='btn btn-danger' href='php/deleteprod.php?idproduct=",$fila['idproduct'],"'>Eliminar</a>";?>
                </div>
            </div>
        </a>

<?php }}else{?>
        </div>
        <br><br><br><br><h3 class="lead text-center  bg-danger p-3 text-white">No hay productos disponibles</h3>
<?php }?>

    </div>
</body>