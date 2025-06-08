<?php

class Equipamento{

    public $id;
    public $nome;
    public $descricao;
    public $quantidade_total;
    public $quantidade_disponivel;

    public function __construct($nome,$descricao,$quantidade_total){
        $this->nome=$nome;
        $this-> descricao = $descricao;
        $this->quantidade_total;
    }
}