<?php
    include("connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
    $idproduct = $_GET["idproduct"];

    $query = "SELECT * FROM shoppingcar WHERE iduser = '$iduser' and idproduct = '$idproduct';";
    $result = mysqli_query($conex, $query);
    $fila=mysqli_fetch_array($result);

    if($fila['amount']==1){
        $query2 = "DELETE FROM shoppingcar WHERE  iduser = '$iduser' and idproduct = '$idproduct';";
        $result2 = mysqli_query($conex, $query2); 
        echo'<script type="text/javascript"> alert("Producto eliminado de tu carrito");</script>';
    }else{
        $aux = $fila['amount'];
        $aux -= 1;

        $query3 = "UPDATE shoppingcar SET amount='$aux' WHERE iduser = '$iduser' and idproduct = '$idproduct';";
        $result3 = mysqli_query($conex, $query3); 
    }

    header("refresh:0; url=../shoppingcar.php");

?> 