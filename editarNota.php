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
        //llenado de select de categorías
        $categ = "SELECT * FROM categorias WHERE borrado = 0";
        $resCat = mysqli_fetch_all(mysqli_query($conexion, $categ));

        //Obtiene el id del elemento a editar
        //La variable $res se usa para pintar los datos en el Formulario
        $id = $_GET['id'];
        $sql = "SELECT * FROM notas WHERE id = '$id'";
        $res = mysqli_fetch_all(mysqli_query($conexion, $sql));


    }

    if(!empty($_POST)){
            $titulo = $_POST['titulo'];
            $introduccion = $_POST['introduccion'];
            $imagen = $_POST['imagen'];
            $categoria = $_POST['categoria'];
            $contenido = $_POST['contenido'];
            $autor = $_POST['autor'];
            $fecha = $_POST['fecha'];

            //Obtención de id de la categoría para poder ser añadida a la DB
            $sqlAddCat = "SELECT id FROM categorias WHERE nombre = '$categoria' ";
            $resulCat = $queryAddCat = mysqli_fetch_all(mysqli_query($conexion, $sqlAddCat));
            $nuevaCat = '';
            foreach($resulCat[0] as $item){
                $nuevaCat = $item;
            }
            //Prerarar sentencia para actualizar la nota en la DB 
            $sqlInsert = "UPDATE notas SET titulo = '$titulo', introduccion = '$introduccion',  imagen = '$imagen', categoria_id = '$nuevaCat',  contenido = '$contenido', autor = '$autor',  fecha = '$fecha' WHERE id = '$id'";
            //Ejecución de la sentencia y comrobación correcta de la misma
            var_dump($sqlInsert);
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
                <a href="/menuAdminNotas.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="divBack">
                <a href="/menuAdminNotas.php" ><label class="back">Volver</label></a>
            </div>
        </div>
    </header>   
    <main class="main">
        <div class="formulario">
            <form action="" method="POST">
                <div class="title has-text-centered">
                    <h1>Editar Nota:</h1>
                </div>
                <div class="field">
                    <label for="user" class="label">Titulo:</label>
                    <div class="control">
                        <input type="text" name="titulo" class="input" maxlength="250" value="<?php echo $res[0][1]; ?>">
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">Introducción:</label>
                    <div class="control">
                    <textarea class="textarea" name="introduccion" id="" maxlength="250"><?php echo $res[0][2]; ?></textarea>
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Imagen:</label>
                    <div class="control">
                        <input type="file" class="input" name="imagen" maxlength="250" value="<?php echo $res[0][3]; ?>">
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Categoría</label>
                    <div class="control">
                        <div class="select">
                        <select name="categoria" id="">
                            <?php foreach ($resCat as $item): ?>
                                <option value="<?php echo $item[1]; ?>"> <?php echo $item[1]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Contenido:</label>
                    <div class="control">
                    <textarea class="textarea" name="contenido" id=""><?php echo $res[0][5]; ?></textarea>
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Autor:</label>
                    <div class="control">
                        <input type="text" class="input" name="autor" maxlength="250" value="<?php echo $res[0][6]; ?>">
                    </div>
                </div>
                <div class="field">
                    <label for="user" class="label">Fecha:</label>
                    <div class="control">
                        <input type="date" name="fecha" class="input" value="<?php echo $res[0][7]; ?>">
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