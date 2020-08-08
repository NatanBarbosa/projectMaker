<?php
session_start();

#conectando com o banco de dados
require 'class_Conexao.php';
$conexao = new Conexao();
$conexao = $conexao->conectar();

#recuperando usuários do banco e verificando o login do front
$query = 'SELECT * FROM USUARIOS WHERE email = :email AND senha = :senha';
$stmt = $conexao->prepare($query);
$stmt->bindValue(':email', $_POST['email']);
$stmt->bindValue(':senha', $_POST['senha']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_OBJ);

if( !empty($user) ){
    //Login válido -> segue o fluxo
    $_SESSION['id_user'] = $user->id_user;
    $_SESSION['email'] = $user->email;
    $_SESSION['senha'] = $user->senha;
    header('Location:../info.php');
} else {
    //login invalido -> volta para tela de login
    header('Location:../index.php?login=invalido');
}