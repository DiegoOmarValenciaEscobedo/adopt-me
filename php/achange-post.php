<?php
	include("connection.php");
	$idpost = $_GET["idpost"];

	$query2 = "SELECT adopted AS 'a' FROM dogposts WHERE idpost = '$idpost';";
    $adopted = mysqli_query($conex, $query2);
    $sadopted=mysqli_fetch_array($adopted);

    if($sadopted['a']==0){
    	$query = "UPDATE dogposts SET adopted='1' WHERE idpost = '$idpost';";
		$result = mysqli_query($conex, $query);
    }else{
    	$query = "UPDATE dogposts SET adopted='0' WHERE idpost = '$idpost';";
		$result = mysqli_query($conex, $query);
    }

	header("refresh:0; url=../aposts.php");
?>