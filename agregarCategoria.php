<?php 
    include_once 'config.php';
    session_start();

    $validaUsr = $_SESSION['usuario'];

    if($validaUsr == null || $validaUsr == ''){
        echo 'Acceso denegado';
        header('Location: index.php');
        die();
    }else{
        if(!empty($_POST)){

            //Variable para el registro en la DB, traído del DOM por método POST
            $categoria = $_POST['categoria'];

            $sql = "INSERT INTO categorias (nombre) VALUE ('$categoria')";

            if(mysqli_query($conexion, $sql)){
                header('Location: menuAdminCategorias.php');
            }else{
                echo 'error';
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
    <title>Techies Blob Admin</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="icon" type="image/png" href="/public/img/logo.png" />
</head>
<body>
    <header>
        <div class="navBarHome">
            <div>
                <a href="/menuAdminCategorias.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="divBack">
                <a href="/menuAdminCategorias.php" ><label class="back">Volver</label></a>
            </div>
        </div>
    </header>   
    <main class="main">
        <div class="formulario">
            <form action="" method="POST">
                <div class="title has-text-centered">
                    <h1>Agregar Categoría:</h1>
                </div>
                <div class="field">
                    <label for="user" class="label">Nombre:</label>
                    <div class="control">
                        <input type="text" class="input" placeholder="Categoría" maxlength="20" name="categoria" required>
                    </div>
                </div>
                <div class="field">
                    <div class="divBtn level-item has-text-centered">
                        <button class="btnBlog" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>