
<?php 
session_start(); // iniciar la sesion
require('./databases.php');

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="SELECT email,clave FROM peluqueria.cliente WHERE email='$email' AND clave='$password'";
    $resultado=pg_query($conn,$query);
    $user = pg_fetch_assoc($resultado);// para traer los datos en un array 
    $mensaje='';

    if ($user) {//para validar si nos trajimos datos de la base de datos 
        if ($email == $user['email'] && $password == $user['clave']) {//comparamos los datos 
            $_SESSION['email'] = $email; // almacenar el email en la sesio 'email'  
            header("Location:Admin.php");
        }
    }else{//en el caso de que no halla traido nada de la base de datos
        $mensaje='no coinciden los datos';
       
     }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>login</title>
</head>
<body>
    <?php require("./partials/header.php")?>
    <?php if(!empty($mensaje)): ?>
      <p> <?= $mensaje ?></p>
    <?php endif; ?>
    <h1>Login</h1>
    <span>o <a href="singup.php">Registrarse</a></span>
    <form action="login.php" method="POST">
        <input type="text" name="email" value="" placeholder="ingrese su correo">
        <input type="password" name="password" placeholder="ingrese su contraseña">
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>