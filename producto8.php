<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    header('Location');
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
    <title>Motorola G6 - Tecno Movil</title>
</head>
<body class="producto">
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
<!-- Descripcion del procucto -->
<section>
    <div class="products">
        <div class="row">
            <div class="col-md-9 col-lg-4">
                <br>
                    <img src="img/moto-g6.jpeg" alt="logotipo" class="img-fluid mb-3">
                                
            </div>
            <div class="row-description">
                
                <ul>
                    <h2>MOTO G6</h2>
                    <hr>
                    <li>Liberado</li>
                    <li>Procesador Qualcomm | Snapdragon 636</li>
                    <li>Pantalla 1080 x 2270 pixels FHD+ - IPS LCD</li>
                    <li>Cámara trasera de 12 MP f/1.8</li>
                    <li>Cámara delantera 7 MP f/2.2</li>
                    <li>Bateria  Li-Ion 3000 mAh</li>
                    <li>Resistencia al agua y al polvo IP67</li>
                    <li>Memoria interna: <strong> 64 GB</strong></li>
                </ul>
                <hr>
                <ul><li><strong>PRECIO: 16.000 ARS</strong></li></ul>
                <button type="button" class="btn btn-outline-success"><a href="carrito.php?nombre=Motorola-Moto-G6&precio=16000">Comprar ahora</button></a>
                <button type="button" class="btn btn-outline-primary">Agregar al carrito</button>
            </div>
            
        </div>   
      
        
        
    </div> 
    <br><br>
    <br><br>
    <br><br>
    <br>
</section>
 <!--  BARRA DE PIE DE PAGINA  -->
<footer class="abajo">
<nav class="navbar navbar-expand-lg navbar-light ">
<a href="index.php"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="navbar-nav m-auto">
<a class="nav-item nav-link active" href="contacto.php">QuienesSomos<span class="sr-only">(current)</span></a>
<a class="nav-item nav-link active" href="Registrar.php">Registrarse <span class="sr-only">(current)</span></a>
<a class="nav-item nav-link active" href="preguntas.php">Ayuda<span class="sr-only">(current)</span></a>
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