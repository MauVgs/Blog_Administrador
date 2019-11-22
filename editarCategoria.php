<?php 
    include_once 'config.php';

    //Comprueba la sesión
    session_start();
    $validaUsr = $_SESSION['usuario'];

    //Rechaza la view si no se inicia la sesión
    if($validaUsr == null || $validaUsr == ''){
        echo 'Acceso denegado';
        header('Location: index.php');
        die();
    }else{
        //Obtiene el id del elemento a editar
        $id = $_GET['id'];

        $sql = "SELECT * FROM categorias WHERE id = '$id'";
        $res = mysqli_fetch_all(mysqli_query($conexion, $sql));
    }

    if(!empty($_POST)){
        $nuevaCat = $_POST['categoria'];
        $data = "UPDATE categorias SET nombre = '$nuevaCat' WHERE id = '$id'";

        if(mysqli_query($conexion, $data)){
            header('Location: menuAdminCategorias.php');
        }else{
            echo 'error';
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
                    <h1>Editar Categoría:</h1>
                </div>
                <div class="field">
                    <label for="user" class="label">Nombre:</label>
                    <div class="control">
                        <input type="text" class="input" value="<?php echo $res[0][1]; ?>" name="categoria">
                    </div>
                </div>
                <div class="field">
                    <div class="divBtn level-item has-text-centered">
                        <button class="btnBlog" type="submit">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>