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