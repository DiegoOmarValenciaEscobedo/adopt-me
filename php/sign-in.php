<?php
	include("connection.php");

	if(isset($_POST['register'])){
		$name = trim($_POST['name']);
		$plastname = trim($_POST['plastname']);
		$mlastname = trim($_POST['mlastname']);
		$bdd = trim($_POST['bdd']);
		$phonenumber = trim($_POST['phonenumber']);
		$street = trim($_POST['street']);
		$col = trim($_POST['col']);
		$housen = trim($_POST['housen']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$cpassword = trim($_POST['cpassword']);
		$query = "INSERT INTO users(name, plastname, mlastname, bdd, phonenumber, street, col, housen, email, password, type)VALUES('$name','$plastname','$mlastname','$bdd','$phonenumber','$street','$col','$housen','$email','$password','U')";
		if($password == $cpassword){
			$result = mysqli_query($conex, $query);
			if ($result){
?>
				<h3 class="lead text-center col-12 bg-success"> Usuario Registrado Exitosamente, ahora puedes ir a iniciar sesion</h3>
<?php
			}
		}else{
?>
				<h3 class="lead text-center col-12 bg-danger">Las contraseñas no coinciden</h3>
<?php
		}
	}
?>