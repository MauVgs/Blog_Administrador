<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notas</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
</head>
<body>
    <main class="mainAdmin">
        <br>
        <br>
        <div class="title">
            <h1>Notas:</h1>
            <hr>
        </div>
        <div class="formulario">
            <form action="">

                <div class="row">
                    <div class="col">
                        <label for="" class="label">Título</label>
                        <div>
                            <input type="text" class="input" placeholder="Titulo">
                        </div>
                    </div>

                    <div class="col">
                        <label for="" class="label">Introducción</label>
                        <div>
                            <input type="text" class="input" placeholder="Introducción">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <label for="" class="label">Imagen</label>
                        <div>
                            <input type="file" class="input" placeholder="Titulo">
                        </div>
                    </div>

                    <div class="col">
                        <label for="" class="label">Categoría</label>
                        <div>
                            <input type="text" class="input" placeholder="Categoría">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="" class="label">Contenido</label>
                        <div>
                            <textarea class="textarea" name="" id="" placeholder="Escibe aquí el contenido"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="" class="label">Autor</label>
                        <div>
                            <input type="text" class="input" placeholder="Autor">
                        </div>
                    </div>
                </div>

                <div class="colFecha">
                    <label for="" class="label">Fecha</label>
                    <div>
                        <input type="date" class="input date">
                    </div>
                </div>

                <div class="row">
                    <div class="colBtn">
                        <p class="control">
                            <button class="button is-info is-rounded">Agregar</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <br>
        <br>

        <div class="tabla">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Introducción</th>
                        <th>Imagen</th>
                        <th>Categoría</th>
                        <th>Contenido</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="divBack">
            <a href="/public/views/menuAdmin.php" ><label class="back">Volver</label></a>
        </div>
        
    </main>
</body>
</html>