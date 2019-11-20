<?php 
    // require_once 'config/connection.php';
    // $obj = new DBConexion();


    $userdb = 'mau';
    $password = 'root';
    $server = '127.0.0.1';
    $dbname = 'techies_blog';


    $conexion = mysqli_connect($server, $userdb, $password, $dbname) or die ('Upps! No se ha podido conectar al SERVER');

    
    if(!empty($_POST)){
        //Obtener usuario y contraseña del DOM
        $user = $_POST['user'];
        $password = $_POST['password'];
        
        //Convertirlos a minúscula para poder comparar
        $user = strtolower($user);
        $password = strtolower($password);

        //Prepara la consulta para la comprobación de los campos con los usuarios registrados en la DB
        $sqlLogin = "SELECT * FROM admins WHERE usuario = '$user' AND contrasena = '$password'";
        
        //Realiza la consulta en la DB
        $res = $query = mysqli_query($conexion, $sqlLogin);

        $result = mysqli_fetch_all($res);
        print_r($result);

        //Comprueba el resultado de la consulta para brindar acceso o denegar
        if(!empty($result)){
            session_start();
            $_SESSION['usuario'] = $user;
            header('Location: menuAdminNotas.php');
            echo 'Encontrado';
        }else{
            header('Location: index.php');
            echo 'No encontrado';
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
</head>
<body>
    <main class="main">
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
</body>
</html>