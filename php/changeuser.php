<?php
	include("connection.php");
	$iduser = $_GET["iduser"];

	$query2 = "SELECT type AS 'a' FROM users WHERE iduser = '$iduser';";
    $type = mysqli_query($conex, $query2);
    $row=mysqli_fetch_array($type);

    if($row['a']=='A'){
    	$query = "UPDATE users SET type='U' WHERE iduser = '$iduser';";
		$result = mysqli_query($conex, $query);
    }else{
    	$query = "UPDATE users SET type='A' WHERE iduser = '$iduser';";
		$result = mysqli_query($conex, $query);
    }

	header("refresh:0; url=../seeusers.php");
?>