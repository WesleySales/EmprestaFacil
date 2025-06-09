<?php

include_once 'conexao/ConexaoDB.php';

class EquipamentoDAO{

    private $conexao;

    public function __construct(){ 
        $this->conexao = ConexaoDB::getConexao();
    }

    public function create($nome, $quantidade_total){
        $sql = "INSERT INTO equipamentos (nome_equipamento, quantidade_total) values (:nome,:quantidade_total)";
    
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':quantidade_total', $quantidade_total);

        try{
            $stmt-> execute();
            echo "$nome cadastrado com sucesso!";
        } catch (PDOException $e){
            echo "Erro ao cadastrar equipamento: " . $e->getMessage();
        }
    }

    public function findAll(){
        $sql = "SELECT * FROM equipamentos";

        $stmt = $this->conexao->prepare($sql);
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar equipamentos: " . $e->getMessage();
            return [];
        }
    }

    public function findById($id){
        $sql = "SELECT * from equipamentos where id_equipamento= :id";

        $stmt = $this -> conexao -> prepare($sql);
        $stmt->bindValue(':id', $id);
        try{
            $stmt -> execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar equipamento: " . $e->getMessage();
            return [];
        }
    }

    public function delete($id){
        $sql = "DELETE FROM equipametos where id_equipamento= :id";

        $stmt = $this -> conexao -> prepare($sql);
        $stmt->bindValue(':id', $id);
        try{
            $stmt -> execute();
            echo "Equipamento deletado com sucesso";
        } catch (PDOException $e) {
            echo "Erro ao buscar equipamento: " . $e->getMessage();
            return [];
        }
    }
}