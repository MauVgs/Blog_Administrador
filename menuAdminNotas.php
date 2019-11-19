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
                <a href="/index.php" ><label class="back">Cerrar sesión</label></a>
            </div>
        </div>
    </header>
    
    <main class="mainMenu">
        <aside class="menu pt sidebar">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li>
                    <i></i>
                    <a href="/menuAdminNotas.php" class="is-active">Listado de notas</a>
                </li>
                <li>
                    <i></i>
                    <a href="/menuAdminCategorias.php">Listado de categorías</a>
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
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
            <div class="botones">
                <div>
                    <a href="/agregarNota.php"><button class="btnAdmin">Agregar</button></a>
                </div>
                <div>
                    <a href="/editarNota.php"><button class="btnAdmin">Editar</button></a>
                </div>
            </div>
        </div>
            
    </main>
</body>
</html>