<?php

class Equipamento{

    public $id;
    public $nome;
    public $descricao;
    public $quantidade_total;
    public $quantidade_disponivel;

    public function __construct($id, $nome,$descricao,$quantidade_total,$quantidade_disponivel){
        $this-> id =$id
        $this-> nome=$nome;
        $this-> descricao = $descricao;
        $this-> quantidade_total = $quantidade_total;
        $this-> quantidade_disponivel = $quantidade_disponivel;
    }
}