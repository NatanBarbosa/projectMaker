<?php
session_start();

#conectando com o banco de dados
require 'class_Conexao.php';
$conexao = new Conexao();
$conexao = $conexao->conectar();

#recuperando usuários do banco e verificando o login do front
$query = "SELECT * FROM epiz_26542926_bd_project_maker.usuarios WHERE email = :email AND senha = :senha;";
$stmt = $conexao->prepare($query);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':senha', $_POST['senha']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_OBJ);

if( !empty($user) ){
    //Login válido -> criando session
    $_SESSION['id_user'] = $user->id_user;
    $_SESSION['email'] = $user->email;
    $_SESSION['senha'] = $user->senha;

    if(isset($_POST['manter_conectado'])){
        //criando cookie
        setcookie('id_user', $user->id_user, time() + 24*60*60, '/');
        setcookie('email', $user->email, time() + 24*60*60, '/');
        setcookie('senha', $user->senha, time() + 24*60*60, '/' );
    }

    //redirecionando
    header('Location:../info.php');
} else {
    //login invalido -> volta para tela de login
    header('Location:../index.php?login=invalido');
}