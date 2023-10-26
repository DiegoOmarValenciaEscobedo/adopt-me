<?php
	include("connection.php");
	session_start();
	if(isset($_POST['login'])){
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$query = "SELECT COUNT(*) AS count, iduser, type from USERS WHERE email ='$email' and password = '$password'";
		$result = mysqli_query($conex, $query);
		$array = mysqli_fetch_array($result);
		$_SESSION['iduser'] = $array['iduser'];

		if($array['count']>0){
			if ($array['type']=='U'){
				header("refresh:0; url=../uhome.php");
			}else if ($array['type']=='A'){
				header("refresh:0; url=../ahome.php");
			}
		}else{
			echo'<script type="text/javascript"> alert("Usuario y/o contraseña incorrectos");window.location.href="../login.php"; </script>';
		}

	}
?>