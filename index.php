<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    header('Location');
}

$errores = [];

if(count($errores) == 0){
    if($_POST){
        if($_POST['salir'] == 'Salir'){
            session_destroy();
            setcookie('usuario','',-1);
            header('Location: login.php');
        }else if(($_POST['guardar'] == 'Guardar Cambios')){

        $db = file_get_contents("usuario.json");
        $usuario = json_decode($db, true);
        
        $usuario['nombre'] = $_POST["name"];
        $usuario['apellido'] = $_POST["surname"];
        $usuario['password'] = $hash = password_hash($_POST["password"], PASSWORD_DEFAULT); 
        $db = json_encode ($usuario);
    
        file_put_contents("usuario.json", $db);
    }
        }
      
}
    


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/b8bd14391e.js" crossorigin="anonymous"></script>
    <title>Tecno Movil</title>
</head>
<body>
    <!--  BARRA DE INICIO -->
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a href="index.php"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                <a class="fas fa-shopping-cart"  href= "carrito.php" ></a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true"><img src="img/usuario.png" alt="" width="25px"></a>
                    </li>
               
                <li class="nav-item dropdown">
                
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"></strong><?= isset($usuario['nombre']) ? $usuario['nombre'] : '' ?></a>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="miperfil.php">Mi Perfil</a>
    </a><form action="index.php" method="post"> <input type='submit' a class="dropdown-item" name='salir' value='Salir' /> </form>
      
    </div>
                </ul>       
            </div>
        </div>
    </nav>
   
</header>
<!-- para hacer el commit -->
<div>
</div>
<!--  Banner  -->
<section>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active ">
            <img src="img/diapositiva-01.jpg" class="d-block w-100" alt="1">
        </div>
        <div class="carousel-item">
            <img src="img/diapositiva-03.jpg" class="d-block w-100" alt="2">
        </div>
        <div class="carousel-item">
            <img src="img/diapositiva-04.webp" class="d-block w-100" alt="3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--  los mas vendidos  -->
<div class="productos-mas-vendidos">
    
    <img class="los-mas-vendidos" width="700px" src="img/los mas vendidos.png" alt="logotipo" class="logo" class="img-fluid">
    
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <a href="producto2.php"><img class="foto"  src="img/apple-iphone-x--1.jpg" alt="Iphone X"></a>
            <img class="oferta" src="img/super sale .png" alt="supersale">
            <a href="producto2.php"><h2>Iphone X 256 gb</h2></a>
            <p class="index">ARS $85.000</p>
        </div>   
        <div class="col-md-6 col-lg-4">
            <a href="producto5.php"><img class="foto" src="img/samsung-galaxy-s9-001.jpg" alt="Samsung s9"></a>
            <img class="oferta" src="img/super sale .png" alt="supersale"> 
            <a href="producto5.php"><h2>Samsung S9</h2></a>
            <p class="index">ARS $29.000</p>   
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="producto8.php"><img class="foto" src="img/moto-g6.jpeg" alt="Motorola G6"></a>
            <img class="oferta" src="img/super sale .png" alt="supersale">  
            <a href="producto8.php"><h2>Motorola G6</h2></a>
            <p class="index">ARS $16.000</p>
        </div>   
    </div>
</div>
</section>
<!--  BARRA DE PIE DE PAGINA  -->
<footer>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a href="index.php"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto">
            <a class="nav-item nav-link active" href="contacto.html">Quienes Somos <span class="sr-only">(current)</span></a>
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