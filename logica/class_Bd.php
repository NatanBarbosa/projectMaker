<?php

class Bd {
    private $conexao;
    private $projeto;

    public function __construct(Conexao $conexao, Projeto $projeto){
        $this->conexao = $conexao->conectar();
        $this->projeto = $projeto;
    }

    public function insertProjeto(){
        #inserindo informações gerais
        $query1 = "INSERT INTO 
                informacoes_gerais(nome,custo_total,colaboradores,data_inicio,data_fim,tempo_previsto,detalhes,fk_id_usuario) 
                VALUES(:nome_projeto, :custoTotal, :colaboradores, :data_inicio, :data_fim, :tempo_previsto, :detalhes, :id_usuario);";
        $stmt = $this->conexao->prepare($query1);
        $stmt->bindValue(':nome_projeto', $this->projeto->__get('nome_projeto'));
        $stmt->bindValue(':custoTotal', $this->projeto->__get('custoTotal'));
        $stmt->bindValue(':colaboradores', $this->projeto->__get('colaboradores'));
        $stmt->bindValue(':data_inicio', $this->projeto->__get('data_inicio'));
        $stmt->bindValue(':data_fim', $this->projeto->__get('data_fim'));
        $stmt->bindValue(':tempo_previsto', $this->projeto->__get('tempo_previsto'));
        $stmt->bindValue(':detalhes', $this->projeto->__get('detalhes'));
        $stmt->bindValue(':id_usuario', $this->projeto->__get('id_usuario'));
        $stmt->execute();
        print_r( $stmt->errorInfo() );

        #selecionando o ID do projeto dinamicamente
        $query_id = "SELECT AUTO_INCREMENT as id FROM information_schema.tables WHERE table_name = 'informacoes_gerais' AND table_schema = 'bd_project_maker' ";
        $stmt = $this->conexao->prepare($query_id);
        $stmt->execute();
        $obj_id_projeto = $stmt->fetch(PDO::FETCH_OBJ);
        $id_projeto = ($obj_id_projeto->id) - 1;

        #inserindo materiais (loop para poder ler todos os valores do array)
        $query2 = '';
        foreach ( $this->projeto->__get('nome_material') as $i => $material ){
            $nome_material = $this->projeto->__get('nome_material')[$i];
            $preco = $this->projeto->__get('preco')[$i];
            $id_usuario = $this->projeto->__get('id_usuario');

            $query2 .= "INSERT INTO materiais(nome_material, preco, fk_id_usuario, fk_id_projeto) VALUES('$nome_material', $preco, $id_usuario, $id_projeto);";
        }
        $this->conexao->query($query2);

        #inserindo funcionarios
        $query3 = '';
        foreach ( $this->projeto->__get('funcao') as $i => $funcionario ){
            $funcao = $this->projeto->__get('funcao')[$i];
            $salario = $this->projeto->__get('salario')[$i];
            $id_usuario = $this->projeto->__get('id_usuario');

            $query3 .= "INSERT INTO funcionarios(funcao, salario, fk_id_usuario, fk_id_projeto) VALUES('$funcao', $salario, $id_usuario, $id_projeto);";
        }
        $this->conexao->query($query3);
    }

    public function selectProjeto_informacoes(){
        #selecionar as informações gerais
        $query1 = "SELECT * FROM informacoes_gerais where fk_id_usuario = :id_user";
        $stmt = $this->conexao->prepare($query1);
        $stmt->bindValue(':id_user', $_SESSION['id_user']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectProjeto_materiais(){
        #selecionar os materiais
        $query2 = "SELECT * FROM materiais where fk_id_usuario = :id_user";
        $stmt = $this->conexao->prepare($query2);
        $stmt->bindValue(':id_user', $_SESSION['id_user']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectProjeto_funcionarios(){
        #selecionar os funcionários
        $query3 = "SELECT * FROM funcionarios where fk_id_usuario = :id_user";
        $stmt = $this->conexao->prepare($query3);
        $stmt->bindValue(':id_user', $_SESSION['id_user']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}