<?php 

    session_start();
    $_SESSION['usuario'] = $user;
    header('Location: menuAdminNotas.php');

?>