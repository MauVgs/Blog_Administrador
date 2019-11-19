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
    <header>
        <div class="navBarHome">
            <div>
                <a href="/index.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
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
                        <input type="text" class="input" placeholder="Categoría">
                    </div>
                </div>
                <div class="field">
                    <div class="divBtn level-item has-text-centered">
                        <a href="/menuAdminNotas.php"><button class="btnBlog" type="button">Actualizar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>