<?php
    session_start();
    if( !isset($_SESSION['email']) || !isset($_SESSION['senha']) || !isset($_SESSION['id_user']) ){
        //Usuário tentou acessar as páginas sem fazer login -> index.php
        header('Location:index.php?login=indefinido');
    }
?>