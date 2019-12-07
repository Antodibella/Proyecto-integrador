<?php
session_start();
if (isset($_GET['email'])) {
    $db = file_get_contents('usuarios.json');
    $usuarios = json_decode($db, true);
    foreach($usuarios as $u){
        if($u['email'] == $_GET['email']){
            $usuario = $u;
        }
    }
    if(isset($_SESSION['usuario']) && $usuario && $usuario['id'] == $_SESSION['usuario']['id']){
        $es_usuario_autenticado = true;
    } else {
        $es_usuario_autenticado = false;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Perfil</title>

    <style>
        h1>span {
            float: right;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <?php if (isset($usuario)) : ?>
        <div style="width: 400px; margin:0 auto;">
            <h1>Perfil 
                <?php if($es_usuario_autenticado): ?>
                <span>
                    <a href="miperfil.php">Editar mi perfil</a>
                </span>
                <?php endif;?>
            </h1>
            <hr>
            <ul>
                <li><strong>Nombre: </strong><?= $usuario['name'] ?></li>
                <li><strong>Email: </strong><?= $usuario['email'] ?></li>
                <li><strong>Usuario: </strong><?= $usuario['username'] ?></li>
            </ul>
        </div>
    <?php else : ?>
        <div>
            <h1>Usuario desconocido</h1>
        </div>
    <?php endif; ?>
</body>
</html>