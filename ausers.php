<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Administrar usuarios</title>
        <link href="css/createpost.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

<?php
    include("php/connection.php");
    session_start();
    $iduser = $_SESSION['iduser'];
?>  

    <nav class="navbar navbar-expand-xl navbar-light bg-light " aria-label="Eleventh navbar example">
        <div class="container-fluid">
            <h1 class="navbar-brand" href="#">Adopt - Me |</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="ahome.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aposts.php">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aproducts.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-info" aria-current="page" href="ausers.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="avets.php">Veterinarias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="adoptions.php">Adopciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aprofile.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-warning" aria-current="page" href="amessages.php">Mensajes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="php/exit.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>

        </div>
    
    </nav>

<?php

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
        $type = trim($_POST['type']);
        $query = "INSERT INTO users(name, plastname, mlastname, bdd, phonenumber, street, col, housen, email, password, type)VALUES('$name','$plastname','$mlastname','$bdd','$phonenumber','$street','$col','$housen','$email','$password','$type')";
        if($password == $cpassword){
            $result = mysqli_query($conex, $query);
            if ($result){
                echo"<script type='text/javascript'>alert('El usuario se ha registrado'); window.location.href='ausers.php'; </script>";
            }else{
                echo"<script type='text/javascript'>alert('Algunos datos no fueron ingresados correctamente');</script>";
            }
        }
    }
?>

    <form class="row px-4 py-5 my-5 text-center border shadow-lg" method="post">

        <div class="col-10 mx-auto p-3">
            <label class="lead">Registro de usuarios</label>
        </div>

        <div class="col-10 mx-auto p-3">
            <a class="btn btn-dark btn-sm mx-5" href="seeusers.php">Ver Usuarios</a>
        </div>
        
        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Nombre" id="name" name="name" required>
            <label for="name">Nombre</label>
        </div>
        
        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Apellido Paterno" id="plastname" name="plastname" required>
            <label for="plastname">Apellido Paterno</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Apellido Materno" id="mlastname" name="mlastname" required>
            <label for="mlastname">Apellido Materno</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="date" class="form-control inpustStyle" id="bdd" name="bdd" required>
            <label for="bdd">Fecha de Nacimiento</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="tel" class="form-control inpustStyle" placeholder="Numero de telefono" id="phonenumber" name="phonenumber" required>
            <label for="phonenumber">Numero de telefono</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Calle" id="street" name="street" required>
            <label for="street">Calle</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Colonia" id="col" name="col" required>
            <label for="col">Colonia</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="text" class="form-control inpustStyle" placeholder="Numero exterior" id="housen" name="housen" required>
            <label for="housen">Numero exterior</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="email" class="form-control inpustStyle" placeholder="Correo" id="email" name="email" required>
            <label for="email">Correo</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <input type="password" class="form-control inpustStyle" placeholder="Contraseña" id="password" name="password" required>
            <label for="password">Contraseña</label>
        </div>
        <div class="form-floating col-5 mx-auto p-3">
            <input type="password" class="form-control inpustStyle" placeholder="Confirma contraseña" id="cpassword" name="cpassword" required>
            <label for="cpassword">Confirma contraseña</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
            <select name="type">
                <option value='A'>Administrador</option>
                <option value='U'>Usuario</option>
            </select>
        </div>

        <br><br><input type="submit" class="btn btn-success col-8 mx-auto p-3" colspan="2" value="REGISTRAR USUARIO" name="register">

    </form>

</body>