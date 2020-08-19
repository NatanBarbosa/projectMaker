<?php
    session_start();
    if( isset($_COOKIE['email']) && isset($_COOKIE['senha']) && isset($_COOKIE['id_user']) ){
        //se existirem cookies, criar a SESSION
        $_SESSION['email'] = $_COOKIE['email'];
        $_SESSION['senha'] = $_COOKIE['senha'];
        $_SESSION['id_user'] = $_COOKIE['id_user'];

        header('Location:info.php');
    }
