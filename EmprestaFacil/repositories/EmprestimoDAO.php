<?php

include_once 'conexao/ConexaoDB.php';

class EmprestimoDAO{

    private $conexao;

    public function __construct(){ 
        $this->conexao = ConexaoDB::getConexao();
    }

    public function create($id_usuario, $id_equipamento){
        $sql = "INSERT INTO emprestimos (usuario_id, equipamento_id, data_emprestimo, data_prevista_devolucao, status_emprestimo) values (:id_usuario, :id_equipamento, :data_emprestimo, :data_prevista_devolucao, :status_emprestimo)";
        
        $stmt = $this->conexao->prepare($sql);

        $data_emprestimo = date("Y-m-d");
        $data_prevista_devolucao = date("Y-m-d", strtotime("+7 days"));
        // $data_devolucao = null;
        $status_emprestimo = "EM ABERTO";
    
        
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->bindValue(':id_equipamento', $id_equipamento);
        $stmt->bindValue(':data_emprestimo', $data_emprestimo);
        $stmt->bindValue(':data_prevista_devolucao', $data_prevista_devolucao);
        // $stmt->bindValue(':data_devolucao', $data_devolucao);
        $stmt->bindValue(':status_emprestimo', $status_emprestimo);
        
        
        try{
            $stmt-> execute();
            echo "Emprestimo cadastrado com sucesso!";
        } catch (PDOException $e){
            echo "Erro ao cadastrar equipamento: " . $e->getMessage();
        }
    }

    public function findAll(){
        $sql = "SELECT * FROM emprestimo";

        $stmt = $this->conexao->prepare($sql);
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar emprestimo: " . $e->getMessage();
            return [];
        }
    }

    public function findById($id){
        $sql = "SELECT * from emprestimo where id_emprestimo= :id";

        $stmt = $this -> conexao -> prepare($sql);
        $stmt->bindValue(':id', $id);
        try{
            $stmt -> execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar emprestimo: " . $e->getMessage();
            return [];
        }
    }

    public function delete($id){
        $sql = "DELETE FROM emprestimo where id_emprestimo = :id";

        $stmt = $this -> conexao -> prepare($sql);
        $stmt->bindValue(':id', $id);
        try{
            $stmt -> execute();
            echo "Emprestimo deletado com sucesso";
        } catch (PDOException $e) {
            echo "Erro ao buscar equipamento: " . $e->getMessage();
            return [];
        }
    }
}