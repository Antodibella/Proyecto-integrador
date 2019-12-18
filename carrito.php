<?php 
//Validaciones formulario
$errores = [];

if ($_POST){
    $db = file_get_contents("pagos.json");
    $usuario = json_decode($db, true);
    if(isset($_POST["name"])){
        if( empty($_POST['name']) ) {
            $errores['name'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['name']) < 2 ) {
            $errores['name'] = "Tu nombre debe tener al menos 2 caracteres.";
            }
    }
    if( isset($_POST['street']) ) {
        if( empty($_POST['street']) ) {
            $errores['street'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['street']) < 2 ) {
            $errores['street'] = "Tu calle debe tener al menos 2 caracteres.";
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
    if( isset($_POST["provincia"]) ) {
        if( empty($_POST['provincia']) ) {
            $errores['provincia'] = "Este campo debe completarse.";
        }
        elseif( strlen($_POST['provincia']) < 2 ) {
            $errores['provincia'] = "No completo el campo provincia.";
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
    if( isset($_POST["ntarjeta"]) ) {
        if( empty($_POST['ntarjeta']) ) {
            $errores['ntarjeta'] = "El campo numero de tarjeta debe completarse.";
        }
        elseif( strlen($_POST['ntarjeta']) < 2 ) {
            $errores['ntarjeta'] = "No completo el campo numero de tarjeta.";
        }
    }
    if( isset($_POST["mesv"]) ) {
        if( empty($_POST['mesv']) ) {
            $errores['mesv'] = "El campo mes vencimiento de la tarjeta debe completarse.";
        }
        elseif( strlen($_POST['ntarjeta']) < 2 ) {
            $errores['mesv'] = "No completo el campo mes vencimiento de la tarjeta.";
        }
    }
    if( isset($_POST["aniov"]) ) {
        if( empty($_POST['aniov']) ) {
            $errores['aniov'] = "El campo año vencimiento debe completarse.";
        }
        elseif( strlen($_POST['ntarjeta']) < 2 ) {
            $errores['aniov'] = "No completo el campo año vencimiento de la tarjeta.";
        }
    }
    if( isset($_POST["ccv"]) ) {
        if( empty($_POST['ccv']) ) {
            $errores['ccv'] = "El campo ccv debe completarse.";
        }
        elseif( strlen($_POST['ntarjeta']) < 2 ) {
            $errores['ccv'] = "No completo el campo ccv.";
        }
    }
    if( isset($_POST["nombretarjeta"]) ) {
        if( empty($_POST['nombretarjeta']) ) {
            $errores['nombretarjeta'] = "El campo nombre de tarjeta debe completarse.";
        }
        elseif( strlen($_POST['nombretarjeta']) < 2 ) {
            $errores['nombretarjeta'] = "No completo el campo nombre de tarjeta.";
        }
    }
    if(count($errores) == 0){
        $pagos[] =[ 
        "nombre" => $_POST["name"],
        "calle" => $_POST["street"],
        "ciudad" => $_POST["city"],
        "provincia" => $_POST["provincia"],
        "cp" => $_POST["cp"],
        "nrotarjeta" => $_POST["ntarjeta"],
        "mesVencimiento" => $_POST["mesv"],
        "añoVencimiento" => $_POST["aniov"],
        "ccv" => $_POST["ccv"],
        "nombreTarjeta" => $_POST["nombreTarjeta"],
        
       
     ];
$db = json_encode ($pagos);

file_put_contents("pagos.json", $db);
    }

}

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
	$sHTML .= '1 - ' . $value['nombre'] . ' ' . $value['precio'] .  '<br>';
	$fPrecioTotal += $value['precio'];
}

//Imprimimos el precio total

$sHTML .= '<br> <hr> <br> <strong>Precio total:</strong> ' . $fPrecioTotal;

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
    <title>Tecno Movil - Carrito</title>
    <body>
    <header>
   <nav class="navbar navbar-expand-lg navbar-light ">
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
<section class="carritocompra">

<div class="jumbotron">
<ul class="carrito" >
<?php if(count($errores)) : ?>                   
                    <ul>
                        <?php foreach($errores as $error): ?>
                            <li><strong><?=$error?></strong></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>    
  <hr>
  <div>
		<?php echo $sHTML; ?>
	</div>
	
        <ul>
        <!--
		<li><a href="carrito.php?nombre=iphone-8&precio=65000"><img src="img/iphone-8-03.png" width= "60px">&nbsp &nbsp Iphone 8</a></li>
        <br>
		<li><a href="carrito.php?nombre=Iphone-X&precio=85000"><img src="img/apple-iphone-x--1.jpg" width= "60px"> &nbsp Iphone X 256 Gb</a></li>
        <br>
		<li><a href="carrito.php?nombre=Iphone-11&precio=125000"><img src="img/apple-iphone-11-pro-1.jpg" width= "60px"> &nbsp Iphone 11 PRO</a></li>
        <br>
		<li><a href="carrito.php?nombre=SamsumgS8&precio=47000"><img src="img/samsung-s8-01.jpg" width= "60px"> &nbsp Samsung S8</a></li>
        <br>
		<li><a href="carrito.php?nombre=SamsumgS9&precio=29000">Samsung S9</a></li>
        <br>
		<li><a href="carrito.php?nombre=SamsumgS10Plus&precio=125000">Samsung S10 Plus</a></li>
        <br>
		<li><a href="carrito.php?nombre=moto-G5&precio=8500">Motorola G5</a></li>
        <br>
		<li><a href="carrito.php?nombre=moto-G6&precio=16000">Motorola G6</a></li>
        <br>
        <li><a href="carrito.php?nombre=moto-G7&precio=18000">Motorola G7</a></li>
        -->
        <br>
		<button type="button" class="btn btn-danger"><a href="carrito.php?vaciar=1">Vaciar Carrito</a></button>
	</ul>	  
 
  
</div>
<!-- Formulario Direccion del Cliente para ir al Pago con CreditCArd -->
<form>

    <div class="form-group-datos-cliente"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Nombre completo</label>
        <input type="text" class="form-control" id="full_name_id" name="name" placeholder="John Deer">
    </div>    

    <div class="form-group-datos-cliente"> <!-- Street 1 -->
        <label for="street1_id" class="control-label">Dirreción</label>
        <input type="text" class="form-control" id="street1_id" name="street" placeholder="Nombre de la calle, Número, Piso, Depto">
    </div>                       

    <div class="form-group-datos-cliente"> <!-- City-->
        <label for="city_id" class="control-label">Ciudad</label>
        <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville">
    </div>                                    
                            
    <div class="form-group-datos-cliente"> <!-- State Button -->
        <label for="state_id" class="control-label">Provincia</label>
        <select class="form-control" name="provincia" id="state_id">
                <option value="e" >Santa Fe</option>
                <option value="ba" >Buenos Aires</option>
                <option value="c" >Cordoba</option>
                <option value="ca" >Catamarca</option>
                <option value="cha" >Chaco</option>
                <option value="ch" >Chubut</option>
                <option value="t" >Tierra del Fuego, Antártida e Isla del Atlántico Sur</option>
                <option value="co" >Corrientes</option>
                <option value="er" >Entre Ríos</option>
                <option value="f" >Formosa</option>
                <option value="j" >Jujuy</option>
                <option value="lp" >La Pampa</option>
                <option value="lr" >La Rioja</option>
                <option value="me" >Mendoza</option>
                <option value="mi" >Misiones</option>
                <option value="ne" >Neuquén</option>
                <option value="rn" >Río Negro</option>
                <option value="sa" >Salta</option>
                <option value="sj" >San Juan</option>
                <option value="sl" >San Luis</option>
                <option value="sc" >Santa Cruz</option>
                <option value="se" >Santiago del Estero</option>
                <option value="tuc" >Tucumán</option>
        </select>                    
    </div>
    
    <div class="form-group-datos-cliente"> <!-- Zip Code-->
        <label for="zip_id" class="control-label">Codigo postal</label>
        <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
    </div>        
    <br><br>  
    
</form>
<!-- Formulario Credit Card -->
<form action="#" method="POST" class="credit-card-div">
<div class="panel panel-default" >
 <div class="panel-heading">
     
      <div class="row ">
              <div class="col-md-12">
                  <input type="text" class="form-control" name="ntarjeta" placeholder="Numero de la tarjeta de crédito" />
              </div>
          </div>
     <div class="row ">
              <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >Mes de vencimiento</span>
                  <input type="text" class="form-control" name="mesv" placeholder="MM" />
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >Año de vencimiento</span>
                  <input type="text" class="form-control" name="aniov" placeholder="YY" />
              </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >  CCV</span>
                  <input type="text" class="form-control" name="ccv" placeholder="CCV" />
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
<img src="img/credit-card-2.png" class="img-rounded" width="50px" />
         </div>
          </div>
     <div class="row ">
              <div class="col-md-12 pad-adjust">

                  <input type="text" class="form-control" name="nombretarjeta" placeholder="Nombre de la tarjeta" />
              </div>
          </div>
     
       <div class="row ">
            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
            
            <button type="button" class="btn btn-danger"><a href="carrito.php?vaciar=1">CANCELAR</a></button>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                  <input type="submit"  class="btn btn-warning btn-block" value="PAGAR AHORA" />
              </div>
          </div>
     
                   </div>
              </div>
</form>
</section>

<br><br><br><br><br><br><br><br>
    <footer>
<nav class="navbar navbar-expand-lg navbar-light ">
    <a href="index.php"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto">
            <a class="nav-item nav-link active" href="contacto.php">Quienes Somos <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="Registrar.php">Registrarse <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="preguntas.php">Ayuda<span class="sr-only">(current)</span></a>
            <!--     <i class="fab fa-twitter"></i>
            <i class="fab fa-facebook-f"></i>
            -->
        </div>
    </div>
</nav>
</footer>
    </body>
    </html>