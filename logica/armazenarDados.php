<?php
    #incorporando os arquivos de classes
    require "class_Conexao.php";
    require "class_Bd.php";
    require "class_Projeto.php";
    session_start();

    #instanciando objeto projeto
    $projeto = new Projeto();

    $custo = 0;
    #verificando se o usuário adicionou materiais
    if( isset($_POST['materialPreco']) ){

        #tratando os valores numéricos para o banco de dados
        foreach ($_POST['materialPreco'] as $i => $mp){
            $_POST['materialPreco'][$i] = str_replace('.', '', $mp);
        }
        foreach ($_POST['materialPreco'] as $i => $mp){
            $mp = str_replace(',', '.', $mp);
            $_POST['materialPreco'][$i] = (float)$mp;
        }

        #Calculando o custo total do projeto
        foreach ($_POST['materialPreco'] as $mp){
            $custo += $mp;
        }

        #preenchendo o objeto $projeto
        $projeto->setMateriais($_POST['material'], $_POST['materialPreco']);
    }

    #verificando se o usuário adicionou funcionarios
    if( isset($_POST['funcao']) ){

        #tratando os valores numéricos para o banco de dados
        foreach ($_POST['salario'] as $i => $s){
            $_POST['salario'][$i] = str_replace('.', '', $s);
        }
        foreach ($_POST['salario'] as $i => $s){
            $mp = str_replace(',', '.', $s);
            $_POST['salario'][$i] = (float)$mp;
        }

        #Calculando o custo total do projeto
        foreach ($_POST['salario'] as $s){
            $custo += $s;
        }

        #quantidade de colaboradores
        $qntColaboradores = count($_POST['funcao']);

        #preenchendo o objeto $projeto
        $projeto->setFuncionarios($_POST['funcao'], $_POST['salario']);
        $projeto->__set('colaboradores',$qntColaboradores);
    }

    #calculando o tempo previsto
    $diferenca_de_dias = null;
    if($_POST['dataFim'] != null){
        $segundosInicio = strtotime($_POST['dataInicio']);
        $segundosFim = strtotime($_POST['dataFim']);

        $segundos_entre_datas = $segundosFim - $segundosInicio;
        $diferenca_de_dias = $segundos_entre_datas / (24*60*60);

        #preenchendo o objeto $projeto
        $projeto->__set('data_fim', $_POST['dataFim']);
        $projeto->__set('tempo_previsto', $diferenca_de_dias);
    }

    #preenchendo o objeto $projeto
    $projeto->__set('id_usuario', $_SESSION['id_user']);
    $projeto->__set('nome_projeto', $_POST['nome']);
    $projeto->__set('custoTotal', $custo);
    $projeto->__set('data_inicio', $_POST['dataInicio']);
    $projeto->__set('detalhes', $_POST['descricao']);

    #instanciando os outros dois objetos
    $conexao = new Conexao();
    $bd = new Bd($conexao, $projeto);

    echo '<pre>';
    print_r($projeto);
    echo '<pre>';

    #inserir dados
    $bd->insertProjeto();