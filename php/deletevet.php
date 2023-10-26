<?php
    include("connection.php");
    $idvet = $_GET["idvet"];

    $query = "DELETE FROM vets WHERE idvet = '$idvet';";
    $result = mysqli_query($conex, $query);

    echo'<script type="text/javascript"> alert("Veterinaria eliminada del sistema");</script>';

    header("refresh:0; url=../seevets.php");

?> 