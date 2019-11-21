<?php
        include_once 'config.php';
        //Obtener ID de la nota que se eliminará
        $id = $_GET['id'];
        print_r($id);

        //Sentencia query que eliminará la nota
        $sql = "UPDATE categorias SET borrado = 1 WHERE id = '$id'";
        print_r($sql);
        $res = mysqli_query($conexion, $sql);
        if($res){
            header('Location: menuAdminCategorias.php');
        }else{
            echo 'Error';
        }
?>