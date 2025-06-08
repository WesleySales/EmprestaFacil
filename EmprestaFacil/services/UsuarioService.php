<?php

include_once 'repositories/UsuarioDAO.php';

class UsuarioService{

    private $dao;

    public function __construct() {
        $this->dao = new UsuarioDAO();
    }

    public function cadastrarUsuario($nome,$email,$senha){
        $this->dao-> create($nome,$email,$senha);
    }

    public function buscarPorId($id){
        return $this->dao->findById($id);
    }

    public function listarUsuarios(){
        $usuarios = $this->dao->findAll();
        
        if(empty($usuarios)){
            return "A lista de usuários está vazia!";
        }

        $lista="";
        foreach($usuarios as $usuario){
            $lista .= $usuario->nome_usuario . "<br>";     
        }

        return $lista;

    }

    public function editarUsuario(){}

    public function deletarUsuario($id){
        return $this->dao->delete($id);
    }
}