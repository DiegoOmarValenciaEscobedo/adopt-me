<?php
    include("connection.php");
    $idproduct = $_GET["idproduct"];

    $query = "DELETE FROM shoppingcar WHERE idproduct = '$idproduct';";
    $result = mysqli_query($conex, $query);

    $query = "DELETE FROM products WHERE idproduct = '$idproduct';";
    $result = mysqli_query($conex, $query); 

    echo'<script type="text/javascript"> alert("Producto eliminado de tu carrito");</script>';

    header("refresh:0; url=../seeproducts.php");

?> 