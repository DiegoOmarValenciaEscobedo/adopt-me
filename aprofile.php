<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Mi perfil</title>
        <link href="css/profile.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>

<body>

    <?php
        session_start();
        include("php/connection.php");
        $iduser = $_SESSION['iduser'];
        $query = "SELECT * from USERS WHERE iduser ='$iduser'";
        $result = mysqli_query($conex, $query);
        $array = mysqli_fetch_array($result);
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
                        <a class="nav-link active" aria-current="page" href="ausers.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="avets.php">Veterinarias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="adoptions.php">Adopciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-info" aria-current="page" href="aprofile.php">Perfil</a>
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
    
    <form class="row px-4 py-5 my-5 text-center border shadow-lg" method="POST" action="php/update-user.php">
        <div class="col-10 mx-auto p-3">
<?php
            echo"<label class='lead' name='username'>",$array['name']," ",$array['plastname']," ",$array['mlastname'],"</label>";
?>
            <br><label class="lead text-success">Administrador</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='text' class='form-control text-center' placeholder='Nombre' id='name' name='name' value='",$array['name'],"'>";
?> 
            <label for="name">Nombre</label>
        </div>
        
        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='text' class='form-control text-center' placeholder='Apellido Paterno' id='plastname' name='plastname' value='",$array['plastname'],"'>";
?>
            <label for="plastname">Apellido Paterno</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='text' class='form-control text-center' placeholder='Apellido Materno' id='mlastname' name='mlastname' value='",$array['mlastname'],"'>";
?> 
            <label for="mlastname">Apellido Materno</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='date' class='form-control text-center' id='bdd' name='bdd' value='",$array['bdd'],"'>";
?> 
            <label for="bdd">Fecha de Nacimiento</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='number' class='form-control text-center' placeholder='Numero de telefono' max='9999999999' id='phonenumber' name='phonenumber' value='",$array['phonenumber'],"'>";
?> 
            <label for="phonenumber">Numero de telefono</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='text' class='form-control text-center' placeholder='Calle' id='street' name='street' value='",$array['street'],"'>";
?> 
            <label for="street">Calle</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='text' class='form-control text-center' placeholder='Colonia' id='col' name='col' value='",$array['col'],"'>";
?> 
            <label for="col">Colonia</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='number' class='form-control text-center' placeholder='Numero exterior' id='housen' name='housen' value='",$array['housen'],"'>";
?> 
            <label for="housen">Numero exterior</label>
        </div>

        <div class="form-floating col-5 mx-auto p-3">
<?php
            echo"<input required type='email' class='form-control text-center' placeholder='Correo' id='email' name='email' value='",$array['email'],"'>";
?> 
            <label for="email">Correo</label>
        </div>

        <div class="form-floating col-10 mx-auto p-3 text-info">
            <br><br><input type="submit" class="btn btn-dark" colspan="2" value="Guardar" name="save">
        </div>

    </form>

</body>