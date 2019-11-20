<?php 
    session_start();

    $validaUsr = $_SESSION['usuario'];

    if($validaUsr == null || $validaUsr == ''){
        echo 'Acceso denegado';
        die();
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
                <a href="/index.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="divBack">
                <a href="/cerrarsesion.php" ><label class="back">Cerrar sesión</label></a>
            </div>
        </div>
    </header>
    
    <main class="mainMenu">
        <aside class="menu pt sidebar">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li>
                    <i></i>
                    <a href="/menuAdminNotas.php">Listado de notas</a>
                </li>
                <li>
                    <i></i>
                    <a href="/menuAdminCategorias.php" class="is-active">Listado de categorías</a>
                </li>
            </ul>
        </aside>

        <div class="divInfo">
            <div class="divTabla">
                <div class="title has-text-centered">
                    <h1>Categorías:</h1>
                </div>
                <table class=" container table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Categoria</td>
                            <td><a href=""><i class="material-icons iconEdit">border_color</i></a><a href=""><i class="material-icons iconDel">delete</i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="botones">
                <div>
                    <a href="/agregarCategoria.php"><button class="btnAdmin">Nueva</button></a>
                </div>
            </div>
        </div>
            
    </main>
</body>
</html>