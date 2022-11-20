<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/login.css">
    <title>Login</title>
</head>
<body class="alineacion">
    <div class="formulario">
   
    <div><img class="user" src="../Assets/img/user.jpg" /></div>
        <form  class="cont" method="POST" action=" http://localhost/SistemaDeControlDeLigaDeFutbol/Login/loginVerify"  class="login-form">
            <input type="text"  placeholder="Usuario" name="id_usuario" required autocomplete="off">
            <input type="password"  placeholder="Contraseña" name="password" required autocomplete="off">
            <button>Acceder</button>
            <?php 
           require_once 'Controladores/LoginController.php';
           if(!empty($_POST)){
                $n=new LoginController();
                //echo $mensaje;
                $n->mensaje_error();
           }
            
            ?>
        </form>
    </div>
</body>
</html>