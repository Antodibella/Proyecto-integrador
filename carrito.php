<?php 

$aCarrito = array();
$sHTML = '';
$fPrecioTotal = 0;

//Vaciamos el carrito

if(isset($_GET['vaciar'])) {
	unset($_COOKIE['carrito']);
}

//Obtenemos los productos anteriores

if(isset($_COOKIE['carrito'])) {
	$aCarrito = unserialize($_COOKIE['carrito']);
}

//Anyado un nuevo articulo al carrito

if(isset($_GET['nombre']) && isset($_GET['precio'])) {
	$iUltimaPos = count($aCarrito);
	$aCarrito[$iUltimaPos]['nombre'] = $_GET['nombre'];
	$aCarrito[$iUltimaPos]['precio'] = $_GET['precio'];
}

//Creamos la cookie (serializamos)

$iTemCad = time() + (60 * 60);
setcookie('carrito', serialize($aCarrito), $iTemCad);



//Imprimimos el contenido del array

foreach ($aCarrito as $key => $value) {
	$sHTML .= '-> ' . $value['nombre'] . ' ' . $value['precio'] . '<br>';
	$fPrecioTotal += $value['precio'];
}

//Imprimimos el precio total

$sHTML .= '<br>------------------<br>Precio total: ' . $fPrecioTotal;

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
    <title>Mi carrito</title>
    <body>
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
                    <a class="nav-link" href="preguntas.php" tabindex="-1" aria-disabled="true">AYUDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true"><img src="img/usuario.png" alt="" width="25px"></a>
                </li>
                <li>
                <i class="fas fa-shopping-cart"></i>
                </li>
            </ul>       
        </div>
    </div>
</nav>
<br>
<br>
<section class="carritocompra">

<div class="jumbotron">
<ul class="carrito" >
               
  <hr>
  <div>
		<?php echo $sHTML; ?>
	</div>
	<ul>
		<li><a href="carrito.php?nombre=iphone-8&precio=65000"img="img/iphone-8-03.png">Iphone 8</a></li>
		<li><a href="carrito.php?nombre=Iphone-X&precio=85000">Iphone X 256 Gb</a></li>
		<li><a href="carrito.php?nombre=Iphone-11&precio=125000">Iphone 11 PRO</a></li>
		<li><a href="carrito.php?nombre=SamsumgS8&precio=47000">Samsung S8</a></li>
		<li><a href="carrito.php?nombre=SamsumgS9&precio=29000">Samsung S9</a></li>
		<li><a href="carrito.php?nombre=SamsumgS10Plus&precio=125000">Samsung S10 Plus</a></li>
		<li><a href="carrito.php?nombre=moto-G5&precio=8500">Motorola G5</a></li>
		<li><a href="carrito.php?nombre=moto-G6&precio=16000">Motorola G6</a></li>
        <li><a href="carrito.php?nombre=moto-G7&precio=18000">Motorola G7</a></li>
		<li><a href="carrito.php?vaciar=1">Vaciar Carrito</a></li>
	</ul>	  

  
</div>

</section>
<br><br><br>
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
            <!--     <i class="fab fa-twitter"></i>
            <i class="fab fa-facebook-f"></i>
            -->
        </div>
    </div>
</nav>
</footer>
    </body>
    </html>