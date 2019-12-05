<?php
// Inicio sesión
session_start();
// Inicio errores
$errores = [];
$db = file_get_contents('usuario.json');
$usuarios = json_decode($db, true);
if ($_POST) {
    if (strlen($_POST['username']) < 3) {
        $errores['username'] = 'Debe ingresar su nombre de usuario';
    }
    $usuario = $usuarios[array_search($_POST['username'], array_column($usuarios, 'username'))];
    if (!$usuario) {
        $errores['username'] = 'El usuario no existe';
    } else {
        if (password_verify($_POST['password'], $usuario['password'])) {
            $_SESSION['usuario'] = $usuario;
            if($_POST['recordarme'] == true){
                setcookie('usuario',json_encode($usuario),time()+604800);
            }
            header('Location: miperfil.php');
        } else {
            $errores['password'] = 'La clave no es correcta';
        }
    }
} else {
    if(isset($_COOKIE['usuario'])){
        $_SESSION['usuario'] = json_decode($_COOKIE['usuario'],true);
    }
    if (isset($_SESSION['usuario'])) {
        header('Location: miperfil.php');
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
    <title>Inicia Sesión - Tecno Movil </title>
</head>
<body>
    
    <!--  BARRA DE INICIO -->
    <header>
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
</header>
    <!--  Formulario  -->
    <section>
    <div class="ingresar">
        
        <img class="bienvenidos" src="img/ingresar.png" width="700px" alt="logotipo" class="logo">
    
    <form class="formularioingresar">  
        <div class="form-row">
            <div class="form-group col-md-6 m-auto">
                <label for="inputEmail4"> Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <div class="form-row"> 
            <div class="form-group col-md-6  m-auto" >
                <label for="inputPassword4"> Contraseña</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
                <br>
                <br>
                <button type="submit" class="boton1 ml-auto">ingresar</button>
                <br>
                <br>
                <label for="inputPassword4" class="cuenta  m-auto"> ¿No tienes cuenta?</label>
                <br>
                <br>
                <button type="submit" class="boton1 ml-auto"> <a href="registrar.php"> Registrarme </a></button>
                    <br><br>
            
                <a class="dropdown-item  m-auto" href="#" >Olvide mi contraseña</a>
                <a class="dropdown-item  m-auto" href="#">Olvide mi nombre de usuario</a>
                <a class="dropdown-item  m-auto" href="#">No me llego el mail de confirmacion</a>
            </div>
         </div>
        
    </div>
    
    </section>
    <!--  BARRA DE PIE DE PAGINA  -->
    <footer>
    <nav class="navbar navbar-expand-lg navbar-light ">
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
    </footer>
    
</body>
</html>