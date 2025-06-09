<?php

include_once 'repositories/EquipamentoDAO.php';

class EquipamentoService{

    private $dao;

    public function __construct() {
        $this->dao = new EquipamentoDAO();
    }

    public function cadastrarEquipamento($nome, $quantidade_total){
        $this -> dao -> create($nome, $quantidade_total);
    }

    public function buscarPorId($id){
        return $this->dao->findById($id);
    }

    public function listarEquipamentos(){
        $equipamentos = $this->dao->findAll();
        
        // if(empty($equipamentos)){
        //     return "A lista de equipamentos está vazia!";
        // }

        // $lista="";
        // foreach($equipamentos as $equipamento){
        //     $lista .= $equipamento->nome_equipamento . "<br>";     
        // }

        return $equipamentos;
    }

    public function editarEquipamento(){}

    public function deletarEquipamento($id){
        return $this->dao->delete($id);
    }

    public function getEquipamento($equipamentoBanco){
        $id = $equipamentoBanco -> id_equipamento;
        $nome = $equipamentoBanco -> nome_equipamento;
        $descricao = $equipamentoBanco -> descricao;
        $quantidade_total = $equipamentoBanco -> quantidade_total;
        $quantidade_disponivel = $equipamentoBanco -> quantidade_disponivel;

        $equipamento = new Equipamento($id, $nome,$descricao,$quantidade_total,$quantidade_disponivel);
        return $equipamento;
    }
}