<?php

include_once 'conexao/ConexaoMySQL.php';

class UsuarioDAO{

    private $conexao;

    public function __construct(){ 
        $this->conexao = ConexaoMySQL::getConexao();
    }

    public function create($nome,$email,$senha){
        $sql = "INSERT into usuarios (nome_usuario,email_usuario,senha) values (:nome,:email,:senha)";

        $stmt = $this->conexao->prepare($sql);
        
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senhaHash);

        try {
            $stmt->execute();
            echo "Usuário cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar usuário: " . $e->getMessage();
        }
    }

    public function findAll(){
        $sql = "SELECT nome_usuario from usuarios";

        $stmt = $this->conexao->prepare($sql);

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            return [];
        }
    }

    public function findById($id){
        $sql = "SELECT nome_usuario from usuarios where id_usuario= :id";

        $stmt = $this -> conexao -> prepare($sql);
        $stmt->bindValue(':id', $id);
        try{
            $stmt -> execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            return [];
        }
    }
    // public function update(){}
    public function delete($id){
        $sql = "DELETE FROM usuarios where id_usuario= :id";

        $stmt = $this -> conexao -> prepare($sql);
        $stmt->bindValue(':id', $id);
        try{
            $stmt -> execute();
            echo "Usuario deletado com sucesso";
        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            return [];
        }
    }

}