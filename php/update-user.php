<?php
	include("connection.php");
	session_start();
	if(isset($_POST['save'])){
		$iduser = $_SESSION['iduser'];
		$name = trim($_POST['name']);
		$plastname = trim($_POST['plastname']);
		$mlastname = trim($_POST['mlastname']);
		$bdd = trim($_POST['bdd']);
		$phonenumber = trim($_POST['phonenumber']);
		$street = trim($_POST['street']);
		$col = trim($_POST['col']);
		$housen = trim($_POST['housen']);
		$email = trim($_POST['email']);
		
		$query = "UPDATE users SET name='$name',plastname='$plastname',mlastname='$mlastname',bdd='$bdd',phonenumber='$phonenumber',street='$street',col='$col',housen='$housen',email='$email' WHERE iduser = '$iduser';";
		$result = mysqli_query($conex, $query);
	}
		header("refresh:0; url=../profile.php");
		echo'<script type="text/javascript"> alert("Datos actualizados");</script>';
?>