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
            
            $file_name = $_FILES['imagen']['name'];
            $file_type = $_FILES['imagen']['type'];
            $file_size = $_FILES['imagen']['size'];
            $file_temp_loc = $_FILES['imagen']['tmp_name'];
            $fileNameCmps = explode(".", $file_name);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $file_name) . '.' . $fileExtension;

            $uploadFileDir = 'public/img/';
            $dest_path = $uploadFileDir . $newFileName;
            print_r($dest_path);
            if(move_uploaded_file($file_temp_loc, $dest_path))
            {
                echo ('Entra');
                $message ='File is successfully uploaded.';
                    //Variables para el registro en la DB traídos del DOM por POST
                $titulo = $_POST['titulo'];
                $introduccion = $_POST['introduccion'];
                $imagen = $newFileName;
                $categoria = $_POST['categoria'];
                $contenido = $_POST['contenido'];
                $autor = $_POST['autor'];
                $fecha = $_POST['fecha'];
                $usuario = $_SESSION['idAdmin'];
            
                
                //Prerarar sentencia para agregar la nota a la DB 
                $sqlInsert = "INSERT INTO notas (titulo, introduccion, imagen, categoria_id, contenido, autor, fecha, usuario) VALUES ('$titulo','$introduccion','$imagen','$categoria','$contenido','$autor','$fecha', '$usuario')";

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
            }
            else
            {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
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
    <link rel="icon" type="image/png" href="/public/img/logo.png" />
</head>
<body>
    <header>
        <div class="navBarHome">
            <div>
                <a href="/menuAdminNotas.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="divBack">
                <a href="/menuAdminNotas.php" ><label class="back">Volver</label></a>
            </div>
        </div>
    </header>   
    <main class="main">
        
        <div class="formulario">
            <?php
                if (isset($_SESSION['message']) && $_SESSION['message'])
                {
                printf('<b>%s</b>', $_SESSION['message']);
                unset($_SESSION['message']);
                }
            ?>
                <form method="POST" onsubmit="return evaluar();" enctype="multipart/form-data">
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
                                <option value="<?php echo $item[0]; ?>"> <?php echo $item[1]; ?></option>
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