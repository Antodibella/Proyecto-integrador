<?php

$error = "";

if ($_POST) {
    
    $db = file_get_contents("usuario.json");
    $usuario = json_decode($db, true);

    if(strlen($_POST["name"]) > 2 && strlen($_POST["surname"]) > 2 && strlen($_POST["username"]) > 5 && strlen($_POST["password"]) > 6 && strlen($_POST["city"]) > 2 && strlen($_POST["cp"]) > 2 ) {

       $usuario[] = [   "nombre" => $_POST ["name"],
                        "apellido" => $_POST ["surname"],
                        "username" => $_POST ["username"],
                        "email" => $_POST ["email"],
                        "password" => $hash = password_hash($_POST["password"], PASSWORD_DEFAULT), 
                        "password1" => $hash = password_hash($_POST["password1"], PASSWORD_DEFAULT), 
                        "city" => $_POST ["city"],
                        "country" => $_POST ["country"],
                        "email" => $_POST ["email"],
                        "cp" => $_POST ["cp"],
                     ];
       $db = json_encode ($usuario);

       file_put_contents("usuario.json", $db);
    }
    else {$error = "No completó el formulario";
        if(strlen($_POST["name"]) < 2){
           // echo "El nombre es demasiado corto <br>";
        } 
        if(strlen($_POST["surname"]) < 2){
           // echo "El apellido es demasiado corto <br>";
        } 
        if(strlen($_POST["username"]) < 2){
            // echo "El Usuario debe contener mas de 5 caracteres <br>";
        } 
        // if(strlen($_POST["username"]) > 5){
        //    foreach($usuario => "username")
         //   echo "Ya hay un usuario con ese nombre <br>";
        //}    queremos validar que no exista un usuario.  

        if(strlen($_POST["password"]) < 6){
            //echo "La contraseña es demasiada corta <br>";
        }  
        if(($_POST["password"]) != ($_POST["password1"]) ){
           // echo "Las contraseñas no coinciden <br>";
        } 
        if(strlen($_POST["city"]) < 1){
           // echo "La ciudad no existe <br>";
        }
        if(strlen($_POST["cp"]) < 2){
            // echo "El codigo postal no existe <br>";
        }    
        
        

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
                    <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true"><img src="img/usuario.png" alt="" width="25px"></a>
                </li>
            </ul>       
        </div>
    </div>
</nav>
   
        
        <!--  FORMULARIO  -->
        <div>
        
            <img class="bienvenidos" src="img/bienvenidos a tecno movil.png" width="700px" alt="logotipo" class="logo">
        </div>
        <form class="formularioregistro" action="" method="post">
            <input type="hidden" name="submitted" id="submitted" value="1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name"> Nombre</label>
                    <input type="name" name="name" class="form-control" value="" id="nombre" placeholder="Nombre" required>
                    <span id="register_name_errorloc" class="error"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="surname"> Apellido</label>
                    <input type="apellido" name="surname" class="form-control" id="surname" placeholder="Apellido" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="username"> Usuario</label>
                    <input type="username" name="username" class="form-control" id="username" placeholder="Nombre de Usuario" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email"> Email</label>
                    <input type="text" name="email" value="" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password"> Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password1">Confirmar Contraseña</label>
                    <input type="password"  name="password1" class="form-control" id="password1" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">Ciudad</label>
                    <input type="text" name="city" class="form-control" id="city" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Pais</label>
                    <select id="country" name="country" class="form-control" required>
                        <option selected>Argentina</option>
                        <option>Brasil</option>
                        <option>Chile</option>
                        <option>Uruguay</option>
                        <option>Paraguay</option>
                    </select> 
                </div> 
                <div class="form-group col-md-2">
                    <label for="cp">Codigo Postal</label>
                    <input type="text" name="cp" class="form-control" id="cp" required>
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
                    <label class="form-check-label" for="gridCheck" required>
                    <a href="condiciones.html"> Acepta los terminos y condiciones</a> 
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
        
        