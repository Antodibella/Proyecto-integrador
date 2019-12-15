<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Preguntas Frecuentes - Tecno Movil</title>
</head>
<body class="perfilbody">
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
</header>
<section>
    <div class="ingresar">
        
       
<div class="errores">

      
    </div>            
    <form class="formularioingresar" method="POST" action="login.php">  
        
        <div class="form-row">
            <div class="form-group col-md-6 m-auto">
            <H1>Verifica que esta cuenta te pertenece</H1>
            <br>
            <br>
                <label for="inputEmail4"> Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <div class="form-row"> 
            <div class="form-group col-md-6  m-auto" >
                <br>
                
                <p>Enviaremos un codigo a tu mail para recuperar la cuenta</p>
                <br>
                
                <button type="submit" class="boton1 ml-auto"> <a href="registrar.php"> Enviar codigo </a></button>
 
            </div>
         </div>
        
    </div>
    
    </section>


  <footer>
    <nav class="navbar navbar-expand-lg navbar-light fixed-bottom">
    <a href="index.html"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav m-auto">
            <a class="nav-item nav-link active" href="contacto.html">Quienes Somos <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="Registrar.php">Registrarse <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="preguntas.php">Ayuda<span class="sr-only">(current)</span></a>
            
        </div>
    </div>
</nav>
    </footer>
</body>
</html>