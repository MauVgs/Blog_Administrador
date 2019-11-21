<?php 

        //Variables para conexión a DB
        $userdb = 'mau';
        $password = 'root';
        $server = '127.0.0.1';
        $dbname = 'techies_blog';

        //Conexión a DB
        $conexion = mysqli_connect($server, $userdb, $password, $dbname) or die ('Upps! No se ha podido conectar al SERVER');

?>