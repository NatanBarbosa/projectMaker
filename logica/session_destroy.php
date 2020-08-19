<?php
    session_start();

    //destruir sessão
    session_destroy();

    //destruir cookie
    setcookie('id_user', null, -1, '/');
    setcookie('email', null, -1, '/');
    setcookie('senha', null, -1, '/');

    //redirecionar
    header('Location:../index.php');