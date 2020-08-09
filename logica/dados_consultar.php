<?php
    #incorporando classes
    require_once "class_Bd.php";
    require_once "class_Conexao.php";
    require_once "class_Projeto.php";

    $conexao = new Conexao();
    $projeto = new Projeto();
    $bd = new Bd($conexao, $projeto);

    $lista_informacoes = $bd->selectProjeto_informacoes();
    $lista_materiais =  $bd->selectProjeto_materiais();
    $lista_funcionarios = $bd->selectProjeto_funcionarios();

    echo '<pre>';
    print_r($lista_informacoes);
    echo '</pre>';

    echo '<hr>';

    echo '<pre>';
    print_r($lista_materiais);
    echo '</pre>';

    echo '<hr>';

    echo '<pre>';
    print_r($lista_funcionarios);
    echo '</pre>';