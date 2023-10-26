<?php
	include("connection.php");
	$idpost = $_GET["idpost"];
	
	$query = "DELETE FROM dogposts WHERE idpost = '$idpost';";
	$result = mysqli_query($conex, $query);
    

	header("refresh:0; url=../myposts.php");
	echo'<script type="text/javascript"> alert("Publicacion eliminada");</script>';
?>