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
    private $nome_material = [];
    private $preco = [];

    #funcionarios
    private $funcao = [];
    private $salario = [];

    public function setMateriais($material, $preco){

        foreach ($material as $i => $m){
            $this->nome_material[$i] = $m;
        }

        foreach ($preco as $i => $p){
            $this->preco[$i] = $p;
        }

    }

    public function setFuncionarios($funcao, $salario){

        foreach ($funcao as $i => $f){
            $this->funcao[$i] = $f;
        }

        foreach ($salario as $i => $s){
            $this->salario[$i] = $s;
        }

    }

    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr, $valor){
        $this->$attr = $valor;
    }
}