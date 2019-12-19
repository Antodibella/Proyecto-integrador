
<?php
// Inicio sesión
session_start();
// Inicio errores
$errores = [];
$db = file_get_contents('usuario.json');
$usuarios = json_decode($db, true);
if ($_POST) {
    if (strlen($_POST['email']) < 3) {
        $errores['email'] = 'El email de usuario no es correcto';
    }
    $id = array_search($_POST['email'], array_column($usuarios, 'email'));
    if($id === false){
        $errores['email'] = 'El email no existe';
    } else {

        $usuario = $usuarios[$id];
        if (password_verify($_POST['password'], $usuario['password'])) {
            $_SESSION['usuario'] = $usuario;
            if($_POST['recordarme'] == true){
                setcookie('usuario',json_encode($usuario),time()+604800);
            }
            header('Location: miperfil.php');
        } else {
            $errores['password'] = 'La contraseña no es correcta';
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Inicia Sesión - Tecno Movil </title>
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
    <!--  Formulario  -->
    <section>
    <div class="ingresar">
        
        <img class="bienvenidos" src="img/ingresar.png" width="700px" alt="logotipo" class="logo">
<div class="errores">

        <?php if(count($errores)) : ?>   
                    <img src="img/atencion.png" alt="">      
                    <br><br>        
                    <ul>
                        <?php foreach($errores as $error): ?>
                            <li><strong><?=$error?></strong></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
    </div>            
    <form class="formularioingresar" method="POST" action="login.php">  
        <div class="form-row">
            <div class="form-group col-md-6 m-auto">
                <label for="inputEmail4"> Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <div class="form-row"> 
            <div class="form-group col-md-6  m-auto" >
                <label for="inputPassword4"> Contraseña</label>
                <input  name="password" type="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
    
                <div class="container" style='height:50px;'>
                    <input type="checkbox" name="recordarme" value="true"> Recordarme<br>
                </div>
           
                <button type="submit" class="boton1 ml-auto">ingresar</button>
                <br>
                
                                <br>
                <label for="inputPassword4" class="cuenta  m-auto"> ¿No tienes cuenta?</label>
                <br>
                <br>
                <button type="submit" class="boton1 ml-auto"> <a href="registrar.php"> Registrarme </a></button>
                    <br><br>
            
                <a class="dropdown-item  m-auto" href=""> <a href="olvidecontpaso1.php"> Olvide mi contraseña</a>
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
                <a class="nav-item nav-link active" href="contacto.php">QuienesSomos <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="Registrar.php">Registrarse <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="preguntas.php  ">Ayuda<span class="sr-only">(current)</span></a>
                
            </div>
        </div>
    </nav>
    </footer>
    
</body>
</html>