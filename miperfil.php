<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    header('Location: login.php');
}

$errores = [];
if ($_FILES) {
    if ($_FILES["imagen"]["error"] != 0){
    
        /* $errores['imagen'] = "Hubo un error en el archivo"; */
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
if($_POST){
    if(isset($_POST["name"])){
        if( empty($_POST['name']) ) {
            $errores['name'] = "El campo Nombre debe completarse.";
        }
        elseif( strlen($_POST['name']) < 2 ) {
            $errores['name'] = "Tu nombre debe tener al menos 2 caracteres.";
            }
    }
    if( isset($_POST['surname']) ) {
        if( empty($_POST['surname']) ) {
            $errores['surname'] = "El campo apellido debe completarse.";
        }
        elseif( strlen($_POST['surname']) < 2 ) {
            $errores['surname'] = "Tu apellido debe tener al menos 2 caracteres.";
        }
    }
    if( isset($_POST['password']) ) {
        if( empty($_POST['password']) ) {
            $errores['password'] = "El campo contraseña debe completarse.";
        }
        elseif( strlen($_POST['password']) < 6 ) {
            $errores['password'] = "Tu contraseña debe tener al menos 6 caracteres.";
        }
    }
    if( isset($_POST['password1']) ) {
        if( empty($_POST['password1']) ) {
            $errores['password1'] = "confirme la contraseña.";
        }
        elseif( strlen($_POST['password1']) < 6 ) {
            $errores['password1'] = "Tu confirmacion de contraseña no es correcta.";
        }
    }
    if(($_POST["password"]) != ($_POST["password1"]) ){
        $errores['password1'] = "Las contraseñas no coinciden";
    } 
}
/* 
Notice: Undefined index: salir in C:\laragon\www\Proyecto-integrador\Proyecto-integrador\miperfil.php on line 64

Notice: Undefined index: guardar in C:\laragon\www\Proyecto-integrador\Proyecto-integrador\miperfil.php on line 68
*/
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
    <section class="miperfil">
        

        
        <?php if (isset($usuario)) : ?>
           
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
            <label for=""><b> Foto de Perfil:</b></label>
            <div class="text-center" width="200px">
            <img class="fotoperfil" src="archivos/<?=$usuario['id']?>.jpg" alt="">
            </div>
            <?php endif;?>
            <?php if(count($errores)) : ?>                   
                    <ul>
                        <?php foreach($errores as $error): ?>
                            <li><strong><?=$error?></strong></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?> 
           
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
        <form method="POST" action="miperfil.php" enctype="multipart/form-data">
     
            <p>Por favor complete todo los campos</p>
            
            <label for="name"><b>Nombre:</b></label>
            <br>
            <input type="text" placeholder="Escriba su Nombre" name="name" value="<?= $usuario['nombre'] ?>" required>
                <br><br>
                <label for="surname"><b>Apellido:</b></label>
                <br>
            <input type="text" placeholder="Escriba su Apellido" name="surname" value="<?= $usuario['apellido'] ?>" required>
                <br><br>  
                <label for="psw"><b>Contraseña:</b></label>
                <br>
            <input type="password" placeholder="Escriba su contraseña" name="password" required>
                <br><br>
            <label for="psw"><b>Contraseña:</b></label>
            <br>
            <input type="password" placeholder="Confirme su contraseña" name="password1" required>
            <br><br>
            <b> Cambiar foto</b><br><br>
                <input type="file" name="imagen">
            <br><br>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar Cambios</button>
      
            <br><br>
        </form>
      </div>
    </div>
  </div>
</div>

<hr>
                
<section>

        <?php endif; ?>    
        
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