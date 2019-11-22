<?php 
    include_once 'config.php';
    //Comprueba la sesión
    session_start();
    $validaUsr = $_SESSION['usuario'];

    if($validaUsr == null || $validaUsr == ''){
        echo 'Acceso denegado';
        header('Location: index.php');
        die();
    }else{

        $id = $_GET['id'];

        $datos = "SELECT c.*, (SELECT titulo FROM notas WHERE id = '$id') as titulo_nota, (SELECT usuario FROM usuarios WHERE id = c.usuario_id)  FROM comentarios c WHERE nota_id = '$id'";
        
        $info = $query = mysqli_fetch_all(mysqli_query($conexion, $datos));
        

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="/public/img/logo.png" />
</head>
<body>
    <header>
        <div class="navBarHome">
            <div>
                <a href="/menuAdminNotas.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="divBack">
                <a href="/cerrarsesion.php" ><label class="back">Cerrar sesión</label></a>
            </div>
        </div>
    </header>
    
    <main class="mainMenu">
        <aside class="menu pt sidebar">
            <p class="menu-label"><?php echo 'Bienvenido ' . $_SESSION['usuario']; ?></p>
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li>
                    <a href="/menuAdminNotas.php" class="is-active"><i class="material-icons">dvr</i>Lista de notas</a>
                </li>
                <li>
                    
                    <a href="/menuAdminCategorias.php"><i class="material-icons">featured_play_list</i>Lista de categorías</a>
                </li>
                <li>
                    <a href="/menuAdminUsuario.php" ><i class="material-icons">person</i>Lista de usuarios del blog</a>
                </li>
            </ul>
        </aside>

        <div class="divInfo">
            <div class="divTabla">
                <div class="title has-text-centered">
                    <h1>Comentarios:</h1>
                </div>
                <table class=" container table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nota</th>
                            <th>Usuario</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($info as $item): ?>
                            <tr>
                                <td><?php echo $item[0]; ?></td>
                                <td><?php echo $item[4]; ?></td>
                                <td><?php echo $item[5]; ?></td>
                                <td><?php echo $item[3]; ?></td>
                                <td><a href="/eliminarComentario.php?id=<?php echo $item[0]; ?>"><i class="material-icons iconDel">delete</i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if($info == null): ?>
                    <div class="title has-text-centered">
                        <h1>Esta nota aún no cuenta con comentarios</h1>
                    </div>
                <?php endif ?>
            </div>
        </div>
            
    </main>
</body>
</html>