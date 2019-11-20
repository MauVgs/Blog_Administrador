<?php 
    $_SESSION['usuario'] = '';
    session_abort();
    header('Location: index.php')
?>