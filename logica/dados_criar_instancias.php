<?php
    #incorporando classes
    require_once "class_Bd.php";
    require_once "class_Conexao.php";
    require_once "class_Projeto.php";

    $conexao = new Conexao();
    $projeto = new Projeto();
    $bd = new Bd($conexao, $projeto);

    if( isset($_GET['id_projeto']) ){
        $bd->excluirProjeto((int)$_GET['id_projeto']);
        header('Location:../consultar.php?excluir=sucesso');
    }

    if( isset($_GET['acao']) && $_GET['acao'] === 'cadastrar' ){
        $bd->cadastrarUsuario( $_POST['novo_email'], $_POST['nova_senha'] );
        header('Location:../index.php?login=criado');
    }