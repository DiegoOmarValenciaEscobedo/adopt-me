<?php
    include("connection.php");
    $idproduct = $_GET["idproduct"];

    $query = "SELECT * FROM products WHERE idproduct = '$idproduct';";
    $result = mysqli_query($conex, $query);
    $fila=mysqli_fetch_array($result);

    if($fila['stock']==1){
        $query2 = "DELETE FROM shoppingcar WHERE idproduct = '$idproduct';";
        $result2 = mysqli_query($conex, $query2); 
        $query4 = "DELETE FROM products WHERE idproduct = '$idproduct';";
        $result4 = mysqli_query($conex, $query4); 
        echo'<script type="text/javascript"> alert("Producto eliminado de tu carrito");</script>';
    }else{
        $aux = $fila['stock'];
        $aux -= 1;

        $query3 = "UPDATE products SET stock='$aux' WHERE idproduct = '$idproduct';";
        $result3 = mysqli_query($conex, $query3); 
    }

    header("refresh:0; url=../seeproducts.php");

?> 