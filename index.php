<?php 
    include_once 'config.php';

    //Variable bandera si existe error al iniciar sesión
    
    $errLogIn = 0;

    if(!empty($_POST)){
        //Obtener usuario y contraseña del DOM
        $user = $_POST['user'];
        $password = $_POST['password'];
        
        //Convertirlos a minúscula para poder comparar
        $user = strtolower($user);
        $password = strtolower($password);

        //Prepara la consulta para la comprobación de los campos con los usuarios registrados en la DB
        $sqlLogin = "SELECT id, usuario FROM admins WHERE usuario = '$user' AND contrasena = '$password'";
        
        //Realiza la consulta en la DB
        $res = $query = mysqli_query($conexion, $sqlLogin);
        $result = mysqli_fetch_all($res);

        //Comprueba el resultado de la consulta para brindar acceso o denegar
        if(!empty($result)){
            $idAdmin = $result[0][0];
            $nombreAdmin = $result[0][1];
            session_start();
            $_SESSION['usuario'] = $nombreAdmin;
            $_SESSION['idAdmin'] = $idAdmin;
            header('Location: menuAdminNotas.php');
        }else{
            $errLogIn = 1;
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Techies Blob Admin</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="js/main.js" type="text/javascript">
    <link rel="icon" type="image/png" href="/public/img/logo.png" />
</head>
<body>
    <main class="main">
        <?php if($errLogIn == 1): ?>
            <div class="notification is-danger notification-fixed has-text-centered">
                <button class="delete" onclic="<?php $errLogIn = 0; ?>" id="cerrar"></button>
                El usuario y/o la contraseña son <strong>erróneos</strong>, favor de intentarlo
                 nuevamente.  O <a href="index.php">Crea una cuenta</a> para poder ser parte de nuestro equipo.
            </div>
        <?php endif ?>
        <div class="formulario">
            <form action="" method="POST">
                <div class="field has-text-centered">
                    <img src="/public/img/logo.png" alt="">
                </div>
                <div class="title has-text-centered">
                    <h1>Bienvenido</h1>
                </div>
                <div class="field">
                    <label for="user" class="label">Usuario:</label>
                    <div class="control">
                        <input type="text" class="input" placeholder="Usuario" name="user">
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">Contraseña:</label>
                    <div class="control">
                        <input type="password" class="input" placeholder="Contraseña" name="password">
                    </div>
                </div>
                <div class="field">
                    <div class="divBtn level-item has-text-centered">
                        <a href="/menuAdminNotas.php"><button class="btnBlog" type="submit">Entrar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                $notification = $delete.parentNode;
                $delete.addEventListener('click', () => {

                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>
</body>
</html>