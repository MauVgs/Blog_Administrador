<?php 
        include_once 'config.php';
        //Obtener ID de la nota que se eliminará
        $id = $_GET['id'];
        print_r($id);

        //Sentencia query que eliminará la nota
        $sql = "DELETE FROM notas WHERE id = '$id'";
        $res = mysqli_query($conexion, $sql);
        if($res){
            header('Location: menuAdminNotas.php');
        }else{
            echo 'Error';
        }
?>