<?php 
require('./databases.php');
$message='';
if (!empty($_POST['email']) && !empty($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_pass=$_POST['confirm'];
    $mensaje='';

    if ($password == $confirm_pass) {
        $query = "INSERT INTO peluqueria.cliente (email, clave) VALUES ('$email', '$password')";
        $resultado=pg_query($conn, $query);
        


        if (!$resultado) {
            $message = ' :( Lo siento tenemos un problema con sus credenciales';
        }else{
            $message = 'Usuario creado!, ya puedes iniciar sesión :)';
        }

    }else{
  
      $message = 'Las contraseñas no coinciden';
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <?php require("./partials/header.php")?>

    <?php if(!empty($message)): ?>
      <p class="mensaje"> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Login</a></span>
    <form action="singup.php" method="POST">
        <input type="text" name="email" value="" placeholder="ingrese su correo">
        <input type="password" name="password" placeholder="ingrese su contraseña">
        <input type="password" name="confirm" placeholder="confirme su contraseña">
        <input type="submit" value="Enviar">
    </form>

    </form>
    
</body>
</html>