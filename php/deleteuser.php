<?php
    include("connection.php");
    $iduser = $_GET["iduser"];

    $query = "DELETE FROM shoppingcar WHERE iduser = '$iduser';";
    $result = mysqli_query($conex, $query);

    $query = "DELETE FROM users WHERE iduser = '$iduser';";
    $result = mysqli_query($conex, $query); 

    echo'<script type="text/javascript"> alert("Usuario eliminado");</script>';

    header("refresh:0; url=../seeusers.php");

?> 