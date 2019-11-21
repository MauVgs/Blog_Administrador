<?php 
    include_once 'config.php';
    session_start();

    $validaUsr = $_SESSION['usuario'];

    if($validaUsr == null || $validaUsr == ''){
        echo 'Acceso denegado';
        header('Location: index.php');
        die();
    }else{
        $sql = 'SELECT * FROM notas';

        $res = $query = mysqli_fetch_all(mysqli_query($conexion, $sql));
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
                    <a href="/menuAdminUsuario.php"><i class="material-icons">person</i>Lista de usuarios del blog</a>
                </li>
            </ul>
        </aside>

        <div class="divInfo">
            <div class="divTabla">
                <div class="title has-text-centered">
                    <h1>Notas:</h1>
                </div>
                <table class=" container table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Introducción</th>
                            <th>Imágen Principal</th>
                            <th>Categoría</th>
                            <th>Contenido</th>
                            <th>Autor</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res as $item): ?>
                            <tr>
                                <td><?php echo $item[0]; ?></td>
                                <td><?php echo $item[1]; ?></td>
                                <td><?php echo $item[2]; ?></td>
                                <td><img src="public/img/<?php echo $item[3]; ?>" alt=""></td>
                                <td><?php 
                                $sql = "SELECT nombre FROM categorias WHERE id = '$item[4]'";
                                $resul = $query = mysqli_fetch_all(mysqli_query($conexion, $sql));
                                echo ($resul[0][0]);
                                ?></td>
                                <td><?php echo $item[5]; ?></td>
                                <td><?php echo $item[6]; ?></td>
                                <td><?php echo $item[7]; ?></td>
                                <td><a href="/editarNota.php?id=<?php echo $item[0]; ?>"><i class="material-icons iconEdit">border_color</i></a><a href="/eliminarNota.php?id=<?php echo $item[0]; ?>"><i class="material-icons iconDel">delete</i></a></td>
                                <td><a href="/listadoComentarios.php?id=<?php echo $item[0]; ?>">Detalles</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="botones">
                <div>
                    <a href="/agregarNota.php"><button class="btnAdmin">Nueva</button></a>
                </div>
            </div>
        </div>
            
    </main>
</body>
</html>