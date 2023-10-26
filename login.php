<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Inicia Sesion</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container-center">

        <form class="form-su form-control form-control-sm" method="POST" action="php/login-process.php">  

            <br><a href="index.html"><img src="images/logo-sm.jpg"></a>
            <h2 class="lead">Inicia Sesion</h2><br>

            <div class="form-floating">
                <input type="email" class="form-control inpustStyle" placeholder="Correo" id="email" name="email">
                <label for="email">Correo</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control inpustStyle" placeholder="Contraseña" id="password" name="password">
                <label for="password">Contraseña</label>
            </div>
            <br><input type="submit" class="btn btn-primary btn-md" colspan="2" value="INGRESAR" name="login"><br><br> 
        </form>
    </div>

    <div class="container-down">
        
        <div class="form-su form-control form-control-sm">
            <h1 class="lead">¿No tienes una cuenta?</h1>
            <h2 class="lead">Crea una, solo te toma unos minutos</h2>
            <a href="signin.php" class="btnindex btn btn-info btn-sm">Registrate</a>
        </div>

    </div>

</body>

</html>