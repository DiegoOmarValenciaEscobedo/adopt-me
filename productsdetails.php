<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Productos</title>
        <link href="css/productsdetails.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
    $idproduct = $_GET["idproduct"];
    $query = "SELECT * FROM products WHERE idproduct = '$idproduct';";
    $result = mysqli_query($conex, $query);
    $fila=mysqli_fetch_array($result);
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
                        <a class="nav-link active text-info" aria-current="page" href="products.php">Productos</a>
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

    <form class="container border shadow-lg" method="POST">
      
        <div id="divLeftElement">
            <?php echo"<img src='",$fila['image'],"' width='310px'>";?>
         </div>

         <div id="divRightElement">
            <?php echo"<h2>",$fila['name'],"</h2>";?>
            <?php echo"<p class='m-2'>",$fila['description'],"</p>";?>
            
            <div id="divLeftElementInCard"> 
                <?php echo"<p>",$fila['stock']," piezas en existencia</p>";?>
                <?php echo"<input type='number' value='1' min='1' max='",$fila['stock'],"' name='amount'</input>";?>
            </div>

            <div id="divRightElementInCard"> 
                <?php echo"<p> $",$fila['price'],"0  MXN</p>";?>
                <button class='btn btn-success btn-sm' type="submit" name="add">Agregar al carrito</button>
                
            </div>

        </div>

    </form>

<?php
    if(isset($_POST['add'])){

        $query2 = "SELECT COUNT(*) AS 'a' FROM shoppingcar WHERE idproduct = '$idproduct' and iduser = '$iduser';";
        $result2 = mysqli_query($conex, $query2);
        $fila2=mysqli_fetch_array($result2);
        if($fila2['a'] != 0){
            $query4 = "SELECT * FROM shoppingcar WHERE iduser = '$iduser' and idproduct = '$idproduct';";
            $result4 = mysqli_query($conex, $query4);
            $fila4=mysqli_fetch_array($result4);

            $amount = $fila4['amount'];
            $amount += trim($_POST['amount']);
            $query3 = "UPDATE shoppingcar SET amount='$amount' WHERE iduser = '$iduser' and idproduct = '$idproduct';";
            $result3 = mysqli_query($conex, $query3);

        }else{

            $amount = trim($_POST['amount']);
            $query3 = "INSERT INTO shoppingcar(iduser, idproduct, amount) VALUES ('$iduser','$idproduct','$amount');";
            $result3 = mysqli_query($conex, $query3);

        }
        
        echo"<script type='text/javascript'>alert('Producto agregado a tu carrito'); window.location.href='shoppingcar.php'; </script>";
    }

?>

</body>