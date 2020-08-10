<?php
    #incorporando classes
    require_once "class_Bd.php";
    require_once "class_Conexao.php";
    require_once "class_Projeto.php";

    $conexao = new Conexao();
    $projeto = new Projeto();
    $bd = new Bd($conexao, $projeto);

    $lista_informacoes = $bd->selectProjeto_informacoes();