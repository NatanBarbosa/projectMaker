<?php

class Conexao {
    private $host = 'localhost';
    private $dbname = 'bd_project_maker';
    private $user = 'root';
    private $pass = '';

    public function __get($attr){
        return $this->$attr;
    }

    public function conectar(){
        try {
            return new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        } catch(PDOException $e){
            echo 'Não foi possível se conectar ao servidor. <br> Código do erro: ' . $e->getCode() . '<br> Mensagem do erro: ' . $e->getMessage();
        }
    }
}