<?php

include_once 'repositories/EmprestimoDAO.php';
include_once 'services/UsuarioService.php';
include_once 'services/EquipamentoService.php';

class EmprestimoService{

    private $dao;
    private $usuarioService;
    private $equipamentoService;

    public function __construct() {
        $this->dao = new EmprestimoDAO();
        $this->usuarioService = new UsuarioService();
        $this->equipamentoService = new EquipamentoService();
    }

    public function cadastrarEquipamento($usuario_id, $equipamento_id){

        // $usuario = $this->usuarioService->buscarPorId($usuario_id);
        // $equipamento = $this->equipamentoService->buscarPorId($equipamento_id);

        // if(!$usuario || !$equipamento){
        //     return "Usuario ou Equipamento nulos";
        // }

        $this->dao-> create($usuario_id, $equipamento_id);
    }

    public function buscarPorId($id){
        return $this->dao->findById($id);
    }

    public function listarEmprestimos(){
        $equipamentos = $this->dao->findAll();
        
        if(empty($equipamentos)){
            return "A lista de equipamentos está vazia!";
        }

        $lista="";
        foreach($equipamentos as $equipamento){
            $lista .= $equipamento->nome_equipamento . "<br>";     
        }

        return $lista;
    }

    public function deletarEquipamento($id){
        return $this->dao->delete($id);
    }
}