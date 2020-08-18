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
    if( isset($_POST['preco']) ){

        #tratando os valores numéricos para o banco de dados
        foreach ($_POST['preco'] as $i => $mp){
            $_POST['preco'][$i] = str_replace('.', '', $mp);
        }
        foreach ($_POST['preco'] as $i => $mp){
            $mp = str_replace(',', '.', $mp);
            $_POST['preco'][$i] = (float)$mp;
        }

        #Calculando o custo total do projeto
        foreach ($_POST['preco'] as $mp){
            $custo += $mp;
        }

        #preenchendo o objeto $projeto
        $projeto->setMateriais($_POST['nome_material'], $_POST['preco']);
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
    if($_POST['data_fim'] != null){
        $segundosInicio = strtotime($_POST['data_inicio']);
        $segundosFim = strtotime($_POST['data_fim']);

        $segundos_entre_datas = $segundosFim - $segundosInicio;
        $diferenca_de_dias = $segundos_entre_datas / (24*60*60);

        #preenchendo o objeto $projeto
        $projeto->__set('data_fim', $_POST['data_fim']);
        $projeto->__set('tempo_previsto', $diferenca_de_dias);
    }

    #preenchendo o objeto $projeto
    $projeto->__set('id_usuario', $_SESSION['id_user']);
    $projeto->__set('nome', $_POST['nome']);
    $projeto->__set('custo_total', $custo);
    $projeto->__set('data_inicio', $_POST['data_inicio']);
    $projeto->__set('detalhes', $_POST['detalhes']);

    #instanciando os outros dois objetos
    $conexao = new Conexao();
    $bd = new Bd($conexao, $projeto);

    /*
    echo '<pre>';
    print_r($projeto);
    echo '<pre>';
    */

    #inserir dados
    $retorno = $bd->insertProjeto();
    if($retorno !== 'sucesso'){
        header("Location:../criar.php?mensagem=$retorno&criar=erro");
    } else {
        header('Location:../criar.php?criar=sucesso');
    }
    
    