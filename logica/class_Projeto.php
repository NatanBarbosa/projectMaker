<?php

class Projeto {
    #todos
    private $id_usuario;

    #informações gerais
    private $nome_projeto;
    private $custoTotal;
    private $colaboradores;
    private $data_inicio;
    private $data_fim;
    private $tempo_previsto;
    private $detalhes;

    #materiais
    private $nome_material;
    private $preco;

    #funcionarios
    private $funcao;
    private $salario;

    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr, $valor){
        $this->$attr = $valor;
    }
}