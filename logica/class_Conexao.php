<?php

class Conexao {
    private $host = 'sql306.epizy.com';
    private $dbname = 'epiz_26542926_bd_project_maker';
    private $user = 'epiz_26542926';
    private $pass = 'Dm8xXtJfhjBtaG7';

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