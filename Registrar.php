<?php
session_start();
if(isset($_SESSION["usuario"])){
    header("Location: perfil.php");
}


if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    header('Location');
}

$errores = [];
$index=0;
$induser=0;
$id=0;        

if ($_POST){
    $db = file_get_contents("usuario.json");
    $usuario = json_decode($db, true);
    if(isset($_POST["name"])){
        if( empty($_POST['name']) ) {
            $errores['name'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['name']) < 2 ) {
            $errores['name'] = "Tu nombre debe tener al menos 2 caracteres.";
            }
    }
    if( isset($_POST['surname']) ) {
        if( empty($_POST['surname']) ) {
            $errores['surname'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['surname']) < 2 ) {
            $errores['surname'] = "Tu apellido debe tener al menos 2 caracteres.";
        }
    }
    if( isset($_POST['email']) ) {
        if( empty($_POST['email']) ) {
            $errores['email'] = "Este campo debe completarse.";
        }
        elseif( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
            $errores['email'] = "Debés ingresar un email válido.";
        }
    }
    if( isset($_POST['password']) ) {
        if( empty($_POST['password']) ) {
            $errores['password'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['password']) < 6 ) {
            $errores['password'] = "Tu contraseña debe tener al menos 6 caracteres.";
        }
    }
    if( isset($_POST['password1']) ) {
        if( empty($_POST['password1']) ) {
            $errores['password1'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['password1']) < 6 ) {
            $errores['password1'] = "Tu confirmacion de contraseña no es correcta.";
        }
    }
    if(($_POST["password"]) != ($_POST["password1"]) ){
        $errores['password1'] = "Las contraseñas no coinciden";
    } 
    if(!isset($_POST["condiciones"]) ) {
       
            $errores['condiciones'] = "No aceptó terminos y condiciones.";
       
    }
    if(isset($_POST["promociones"]) ) {
       
        $promo['email'] = $_POST["email"];
   
}
    if( isset($_POST["username"]) ) {
        if( empty($_POST['username']) ) {
            $errores['username'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['username']) < 6 ) {
            $errores['username'] = "Tu nombre de usuario debe tener al menos 6 caracteres.";
        }
    }
    if( isset($_POST["city"]) ) {
        if( empty($_POST['city']) ) {
            $errores['city'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['city']) < 2 ) {
            $errores['city'] = "No completo el campo ciudad.";
        }
    }
    if( isset($_POST["cp"]) ) {
        if( empty($_POST['cp']) ) {
            $errores['cp'] = "El campo codigo postal debe completarse.";
        }
        elseif( strlen($_POST['cp']) < 2 ) {
            $errores['cp'] = "No completo el campo codigo postal.";
        }
    }
    if(isset($_POST["email"])){
        $email = array_column($usuario,"email");
        $index = array_search($_POST["email"],$email);
        if($index !== false){
            $errores['email'] = "El email ya se uso para otro registro";
            }
   
    }
    if(isset($_POST["username"])){
        $username = array_column($usuario,"username");
        $induser = array_search($_POST["username"],$username);
        if($induser !== false){
            $errores['username'] = "Ya existe nombre de usuario";
            }
    }
    
    if(count($errores) == 0){

    

    if(count($usuario)){
        $id = end($usuario)['id'] +1;
    } 
    
       $usuario[] = $_SESSION['usuario'] =[  "nombre" => $_POST["name"],
                        "apellido" => $_POST["surname"],
                        "username" => $_POST["username"],
                        "email" => $_POST["email"],
                        "password" => $hash = password_hash($_POST["password"], PASSWORD_DEFAULT), 
                        "city" => $_POST["city"],
                        "country" => $_POST["country"],
                        "email" => $_POST["email"],
                        "cp" => $_POST["cp"],
                        "id" => $id,
                        "promociones" => $_POST["promociones"],
                     ];
       $db = json_encode ($usuario);

       file_put_contents("usuario.json", $db);

       header('Location: miperfil.php');
    } }
                                    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Nuevo Usuario - Tecno Movil </title>
</head>
<body>

      <!--  BARRA DE INICIO -->
<header>

<nav class="navbar navbar-expand-lg navbar-light ">
<a href="index.php"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="barradeinicio">
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="navbar-nav ml-auto">
<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
<li class="nav-item active">
<a class="nav-link" href="index.php">INICIO <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
<a class="nav-link" href="productos.php">PRODUCTOS <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="preguntas.php" tabindex="-1" aria-disabled="true">AYUDA</a>
</li>
<li>
<a class="fas fa-shopping-cart black"  href= "carrito.php" ></a>
</li>
<li class="nav-item">
<a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true"><img src="img/usuario.png" alt="" width="25px"></a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false"></strong><?= isset($usuario['nombre']) ? $usuario['nombre'] : '' ?></a>
<div class="dropdown-menu">
<a class="dropdown-item"  href="miperfil.php">Mi Perfil</a>
</a><form action="index.php" method="post"> <input type='submit' a class="dropdown-item" name='salir' value='Salir' />
</form>
</div>
</ul>       
</div>
</div>
</nav>
</div>
</header>
 <!--  FORMULARIO  -->
 <section>
 <div>
        
            <img class="bienvenidos" src="img/bienvenidos a tecno movil.png" width="700px" alt="logotipo" class="logo">
        </div>
        <?php if(count($errores)) : ?>                   
                    <ul>
                        <?php foreach($errores as $error): ?>
                            <li><strong><?=$error?></strong></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
        <form class="formularioregistro" action="" method="post">
            <input type="hidden" name="submitted" id="submitted" value="1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name"> Nombre</label>
                    <input type="name" name="name" class="form-control"  value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" id="nombre" placeholder="Nombre" required>
                    <span id="register_name_errorloc" class="error"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="surname"> Apellido</label>
                    <input type="apellido" name="surname" class="form-control" value="<?= isset($_POST['surname']) ? $_POST['surname'] : '' ?>" id="surname" placeholder="Apellido" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="username"> Usuario</label>
                    <input type="username" name="username" class="form-control" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" id="username" placeholder="Nombre de Usuario" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email"> Email</label>
                    <input type="text" name="email"  value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control" id="email" placeholder="Email" required>
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
                    <input type="text" name="city"  value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>" class="form-control" id="city" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Pais</label>
                    <select id="country" name="country" value="<?=$_POST['country']?>" class="form-control" required>
                        <option selected>Argentina</option>
                        <option>Brasil</option>
                        <option>Chile</option>
                        <option>Uruguay</option>
                        <option>Paraguay</option>
                    </select> 
                </div> 
                <div class="form-group col-md-2">
                    <label for="cp">Codigo Postal</label>
                    <input type="text" name="cp" class="form-control"  value="<?= isset($_POST['cp']) ? $_POST['cp'] : '' ?>" id="cp" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" name="promociones" for="gridCheck">
                        Quiero recibir promociones
                    </label>
                    <br>
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="condiciones" value="acepto">
                    <label for="condiciones" name="condiciones"> <a href="condiciones.html" value="<?= isset($_POST['condiciones']) ? $_POST['condiciones'] : '' ?>" target="_blank">Acepta los terminos y condiciones</a> </label>
                    
                </div>
            </div>
            <button type="submit" class="boton1">Registrarme</button> <br><br>
        </form>
        </section>
        
        <!--  BARRA DE PIE DE PAGINA  -->
<footer>
<nav class="navbar navbar-expand-lg navbar-light ">
<a href="index.php"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="navbar-nav m-auto">
<a class="nav-item nav-link active" href="contacto.html">QuienesSomos<span class="sr-only">(current)</span></a>
<a class="nav-item nav-link active" href="Registrar.php">Registrarse <span class="sr-only">(current)</span></a>
<a class="nav-item nav-link active" href="preguntas.html">Ayuda<span class="sr-only">(current)</span></a>
<!--     <i class="fab fa-twitter"></i>
<i class="fab fa-facebook-f"></i>
-->
</div>
</div>
</nav>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</footer>
        </body>
        </html>