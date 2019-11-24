<?php

$error = "";

if ($_POST) {
    
    $db = file_get_contents("usuario.json");
    $usuario = json_decode($db, true);

    if(strlen($_POST["username"]) > 6 && strlen($_POST["password"]) > 6 ) {

       $usuario[] = [ "nombre" => $_POST ["name"],
                        "email" => $_POST ["email"],
                        "username" => $_POST ["username"],
                        "contraseña" => $hash = password_hash($_POST["password"], PASSWORD_DEFAULT), 
                     ];
       $db = json_encode ($usuario);

       file_put_contents("usuario.json", $db);
    }
    else {
        $error = "No completó el formulario";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Nuevo Usuario - Tecno Movil </title>
</head>
<body>

       <!--  BARRA DE INICIO -->
   <nav class="navbar navbar-expand-lg navbar-light ">
    <a href="index.html"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">INICIO <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="productos.html">PRODUCTOS <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="preguntas.html" tabindex="-1" aria-disabled="true">AYUDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html" tabindex="-1" aria-disabled="true"><img src="img/usuario.png" alt="" width="25px"></a>
                </li>
            </ul>       
        </div>
    </div>
</nav>
   
        
        <!--  FORMULARIO  -->
        <div>
        
            <img class="bienvenidos" src="img/bienvenidos a tecno movil.png" width="700px" alt="logotipo" class="logo">
        </div>
        <form class="formularioregistro" method="POST">  
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name"> Nombre</label>
                    <input type="name" class="form-control" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido"> Apellido</label>
                    <input type="apellido" class="form-control" id="inputPassword4" placeholder="Apellido">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4"> Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4"> Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Ciudad</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Pais</label>
                    <select id="inputState" class="form-control">
                        <option selected>Argentina</option>
                        <option>Brasil</option>
                        <option>Chile</option>
                        <option>Uruguay</option>
                        <option>Paraguay</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Codigo Postal</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Quiero recibir promociones
                    </label>
                    <br>
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Acepto terminos y condiciones
                    </label>
                </div>
            </div>
            <button type="submit" class="boton1">Registrarme</button>
        </form>
        
        
        
        <!--  BARRA DE PIE DE PAGINA  -->


        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="index.html"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav m-auto">
                        <a class="nav-item nav-link active" href="contacto.html">Quienes Somos <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active" href="Registrar.php">Registrarse <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active" href="preguntas.html">Ayuda<span class="sr-only">(current)</span></a>
                        
                </div>
            </div>
        </nav>
        
        