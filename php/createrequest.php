<?php
	session_start();
    $iduser = $_SESSION['iduser'];
	include("connection.php");


	$idgiver = $_GET["idgiver"];
    $idpost = $_GET["idpost"];

    $query4 = "INSERT INTO requests (idadopter, idgiver, iddog) VALUES ('$iduser','$idgiver','$idpost');"; 
    $result4 = mysqli_query($conex, $query4);
	header("refresh:0; url=../sendmessage.php?iddest=$idgiver&idpost=$idpost");
	echo'<script type="text/javascript"> alert("Solicitud enviada");</script>';
?>