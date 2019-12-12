<?php
session_start();
/* session_destroy();
print_r($_SESSION);exit; */
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    header('Location: login.php');
}
if ($_POST) {
    if ($_POST['salir'] == 'Salir') {
        session_destroy();
        setcookie('usuario','',-1);
        header('Location: login.php');
    }
}
$errores = [];
if ($_FILES) {
    if ($_FILES["imagen"]["error"] != 0){
    
        $errores['imagen'] = "Hubo un error en el archivo";
    } else { 
        $ext = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
        if ($ext == "jpg" || $ext == "png" || $ext == "jpeg" ){
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "archivos/{$usuario['id']}." .  $ext);
        }
        else {
            $errores['imagen'] = "El archivo debe ser .jpg , .jpeg o .png";
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
    <title>Preguntas Frecuentes - Tecno Movil</title>
</head>
<body class="preguntasbody">
   <!--  BARRA DE INICIO -->
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
            </ul>       
        </div>
    </div>
</nav>
</header>
    <section>
        <center>
        <?php if (isset($usuario)) : ?>
            <br>
            <br>
            <br>
        <h1>Mi Perfil </h1>
       
        <ul>
                <li><strong>Nombre: </strong><?= $usuario['nombre'] ?></li>
                <li><strong>Apellido: </strong><?= $usuario['apellido'] ?></li>
                <li><strong>Email: </strong><?= $usuario['email'] ?></li>
                <li><strong>Usuario: </strong><?= $usuario['username'] ?></li>
            </ul>
            

           <?php if(file_exists('archivos/'.$usuario['id'].'.jpg')):?>
            <div class="text-center" width="200px">
            <img class="rounded mx-auto d-block" src="archivos/<?=$usuario['id']?>.jpg" alt="">
            </div>
            <?php endif;?>
            <form action="miperfil.php" method="POST" enctype="multipart/form-data">
                <div class="">
                
                <label for="">Foto de Perfil</label>
                <input type="file" name="imagen">
                
                </div>
                <div>
                <input type="submit" class="btn btn-secondary" value="Enviar"></input>
                </div>
            </form>
           
            <hr>
        <form action="miperfil.php" method="post"> <input type='submit' class="btn btn-secondary" name='salir' value='Salir' /> </form>   
        <br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editar">
  Editar mis datos
</button>

<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarLabel">Editar Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="miperfil.php">
     
            <p>Por favor complete todo los campos</p>
            <label for="name"><b>Nombre</b></label>
            <input type="text" placeholder="Escriba su Nombre" name="name" required>
                <br><br>
                <label for="surname"><b>Apellido</b></label>
            <input type="text" placeholder="Escriba su Apellido" name="surname" required>
                <br><br>  
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Escriba su Email" name="email" required>
                <br><br>
                <label for="email"><b>Usuario</b></label>
            <input type="text" placeholder="Escriba su Usuario" name="username" required>
                <br><br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Escriba su contraseña" name="password" required>
            <br><br>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      
            <br><br>
        </form>
      </div>
    </div>
  </div>
</div>

<hr>
                
<section>

        <?php endif; ?>    
        </center> 
</section>
<br>
<br>
<br>
<br>
<br>
<br>

<footer>
 <nav class="navbar navbar-expand-lg navbar-light fixed-bottom">
    <a href="index.php"><img src="img/LOGO.png" alt="logotipo" class="logo"></a>
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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>