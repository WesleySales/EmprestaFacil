<?php

require_once 'services/EquipamentoService.php';

class EquipamentoController{
    
    //injecao da dependencia EquipamentoService, no spring usava o @autowired
    private $service; 

    public function __construct(){
        $this->service = new EquipamentoService();
    }

    public function exibir(){
        $equipamentos = $this->service-> listarEquipamentos(); //retorna os equipamentos presentes no banco
        include 'views/EquipamentosView.php'; //chama a view de equipamentos ja com os dados acima carregados
    }

}