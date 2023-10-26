<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
    <link href="css/signin.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="index.html"><img src="images/logo-sm.jpg" class="lefticon d-inline-block align-top" alt="Logo Adopt-Me"></a>
        <label class="blockquote text-info">Adopt-Me</label>
        <button class="buttonright btn btn-default"><a href="login.php" class="btn btn-primary">Iniciar Sesion</a></button>
    </nav>

    <div class="container-center mt-4">

        <form class=" form-su form-control form-control-sm" method="post">  

        <br><img src="images/signup-icon.jpg">
            <div class="form-floating">
                <input type="text" class="form-control inpustStyle" placeholder="Nombre" id="name" name="name" required>
                <label for="name">Nombre</label>
            </div>
            
            <div class="form-floating">
                <input type="text" class="form-control inpustStyle" placeholder="Apellido Paterno" id="plastname" name="plastname" required>
                <label for="plastname">Apellido Paterno</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control inpustStyle" placeholder="Apellido Materno" id="mlastname" name="mlastname" required>
                <label for="mlastname">Apellido Materno</label>
            </div>

            <div class="form-floating">
                <input type="date" class="form-control inpustStyle" id="bdd" name="bdd" required>
                <label for="bdd">Fecha de Nacimiento</label>
            </div>

            <div class="form-floating">
                <input type="tel" class="form-control inpustStyle" placeholder="Numero de telefono" id="phonenumber" name="phonenumber" required>
                <label for="phonenumber">Numero de telefono</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control inpustStyle" placeholder="Calle" id="street" name="street" required>
                <label for="street">Calle</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control inpustStyle" placeholder="Colonia" id="col" name="col" required>
                <label for="col">Colonia</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control inpustStyle" placeholder="Numero exterior" id="housen" name="housen" required>
                <label for="housen">Numero exterior</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control inpustStyle" placeholder="Correo" id="email" name="email" required>
                <label for="email">Correo</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control inpustStyle" placeholder="Contraseña" id="password" name="password" required>
                <label for="password">Contraseña</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control inpustStyle" placeholder="Confirma contraseña" id="cpassword" name="cpassword" required>
                <label for="cpassword">Confirma contraseña</label>
            </div>
            <br><br><input type="submit" class="btn btn-success" colspan="2" value="REGISTRARME" name="register">
        </form>
    </div>
    <?php
        include("php/sign-in.php");
    ?>
</body>

</html>