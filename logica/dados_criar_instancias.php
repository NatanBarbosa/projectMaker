<?php
    #incorporando classes
    require_once "class_Bd.php";
    require_once "class_Conexao.php";
    require_once "class_Projeto.php";

    $conexao = new Conexao();
    $projeto = new Projeto();
    $bd = new Bd($conexao, $projeto);

    #excluir projeto
    if( isset($_GET['id_projeto']) ){
        $bd->excluirProjeto((int)$_GET['id_projeto']);
        header('Location:../consultar.php?excluir=sucesso');
    }

    #cadastrar usuário
    if( isset($_GET['acao']) && $_GET['acao'] === 'cadastrar' ){
        $bd->cadastrarUsuario( $_POST['novo_email'], $_POST['nova_senha'] );
        header('Location:../index.php?login=criado');
    }

    #atualizar projeto
    if( isset($_GET['acao']) && $_GET['acao'] === 'atualizar' ){

        //trocar informações gerais
        if(isset($_POST['informacoes_gerais'])){

            foreach ($_POST['informacoes_gerais'] as $coluna => $valor){
                $coluna = explode('-', $coluna);
                $bd->atualizarProjeto('informacoes_gerais', $coluna[0], $valor, 'id_projeto', $coluna[1]);
            }

        }

        //trocar materiais
        if(isset($_POST['materiais'])){

            foreach ($_POST['materiais'] as $coluna => $valor){
                $coluna = explode('-', $coluna);
                $bd->atualizarProjeto('materiais', $coluna[0], $valor, 'id_material', $coluna[1]);
            }

        }

        //trocar funcionarios
        if(isset($_POST['funcionarios'])){
            foreach ($_POST['funcionarios'] as $coluna => $valor){
                $coluna = explode('-', $coluna);
                $bd->atualizarProjeto('funcionarios', $coluna[0], $valor, 'id_funcionario', $coluna[1]);
            }
        }

        header('Location:../consultar.php?atualizar=sucesso');
    }