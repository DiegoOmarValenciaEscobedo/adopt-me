<?php
    include("connection.php");
    $idproduct = $_GET["idproduct"];

    $query = "SELECT * FROM products WHERE idproduct = '$idproduct';";
    $result = mysqli_query($conex, $query);
    $fila=mysqli_fetch_array($result);

    $aux = $fila['stock'];
    $aux += 1;

    $query3 = "UPDATE products SET stock='$aux' WHERE idproduct = '$idproduct';";
    $result3 = mysqli_query($conex, $query3); 

    header("refresh:0; url=../seeproducts.php");

?> 