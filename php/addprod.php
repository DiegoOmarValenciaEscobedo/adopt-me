<?php
    include("connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
    $idproduct = $_GET["idproduct"];

    $query = "SELECT * FROM shoppingcar WHERE iduser = '$iduser' and idproduct = '$idproduct';";
    $result = mysqli_query($conex, $query);
    $fila=mysqli_fetch_array($result);

    $aux = $fila['amount'];
    $aux += 1;

    $query3 = "UPDATE shoppingcar SET amount='$aux' WHERE iduser = '$iduser' and idproduct = '$idproduct';";
    $result3 = mysqli_query($conex, $query3); 

    header("refresh:0; url=../shoppingcar.php");

?> 