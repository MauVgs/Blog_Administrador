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
        //Pintar categorías disponibles en la DB
        $sqlCategoria = 'SELECT * FROM categorias WHERE borrado = 0';
        $resCategoria = $queryCategoria = mysqli_fetch_all(mysqli_query($conexion, $sqlCategoria));

        //Si el post no está vacío, guarda los valores en la DB
        if(!empty($_POST)){

            //Variables para el registro en la DB traídos del DOM por POST
            $titulo = $_POST['titulo'];
            $introduccion = $_POST['introduccion'];
            $imagen = $_POST['imagen'];
            $categoria = $_POST['categoria'];
            $contenido = $_POST['contenido'];
            $autor = $_POST['autor'];
            $fecha = $_POST['fecha'];
            $usuario = $_SESSION['idAdmin'];
            
            //Obtención de id de la categoría para poder ser añadida a la DB
            $sqlAddCat = "SELECT id FROM categorias WHERE nombre = '$categoria' ";
            $resulCat = $queryAddCat = mysqli_fetch_all(mysqli_query($conexion, $sqlAddCat));
            $nuevaCat = '';
            foreach($resulCat[0] as $item){
                $nuevaCat = $item;
            }
            
            //Prerarar sentencia para agregar la nota a la DB 
            $sqlInsert = "INSERT INTO notas (titulo, introduccion, imagen, categoria_id, contenido, autor, fecha, usuario) VALUES ('$titulo','$introduccion','$imagen','$nuevaCat','$contenido','$autor','$fecha', '$usuario')";

            //Ejecución de la sentencia y comrobación correcta de la misma
            try {
                //code...
                if(mysqli_query($conexion, $sqlInsert) === true){
                        header('Location: menuAdminNotas.php');
                    }else{
                        echo 'Error';
                    }
            } catch (Exception $e) {
                //throw $th;
                echo 'Error capturado: ' . $e->getMessage(), "\n";
            }
        }//End if
    }//End else
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
    <header>
        <div class="navBarHome">
            <div>
                <a href="/index.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="divBack">
                <a href="/menuAdminNotas.php" ><label class="back">Volver</label></a>
            </div>
        </div>
    </header>   
    <main class="main">
        
        <div class="formulario">
            <form action="" method="POST" onsubmit="return evaluar();">
                <div class="title has-text-centered">
                    <h1>Agrega nueva nota <?php echo $_SESSION['usuario'];  ?>:</h1>
                </div>
                <div class="field">
                    <label for="user" class="label">Titulo:</label>
                    <div class="control">
                        <input type="text" class="input" placeholder="Titulo" maxlength="250" name="titulo" id="titulo" required>
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">Introducción:</label>
                    <div class="control">
                        <textarea class="textarea" name="introduccion" placeholder="Introducción" maxlength="250" id="introduccion" required></textarea>
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Imagen:</label>
                    <div class="control">
                        <input type="file" class="input" name="imagen" id="imagen" required>
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Categoría</label>
                    <div class="control">
                        <div class="select">
                        <select id="categoria" name="categoria" required>
                            <option value="">Seleccionar</option>
                            <?php foreach ($resCategoria as $item): ?>
                                <option value="<?php echo $item[1]; ?>"> <?php echo $item[1]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Contenido:</label>
                    <div class="control">
                        <textarea class="textarea" name="contenido" id="contenido" placeholder="Contenido" required></textarea>
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Autor:</label>
                    <div class="control">
                        <input type="text" class="input" placeholder="Autor" maxlength="250" name="autor" id="autor" required>
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Fecha:</label>
                    <div class="control">
                        <input type="date" class="input" name="fecha" id="fecha" required>
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
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>