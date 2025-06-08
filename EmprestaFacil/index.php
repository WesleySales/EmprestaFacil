<?php

echo "AQUI VAI FICAR MEU PRIMEIRO PROJETO FODA COM PHP<br><br>";

include 'services/UsuarioService.php';
include 'repositories/EmprestimoDAO.php';
include 'services/EquipamentoService.php';

$empRepo = new EmprestimoDAO();

$empRepo-> create(2,2);

// $service = new UsuarioService();
// $equipamentoService = new EquipamentoService();
// $emprestimoService = new EmprestimoService();

// $emprestimoService->create(1,2);


// echo $service->listarUsuarios();

// $equipamentoRepository->create("Furadeira",10);
// $equipamentoRepository->create("Martelo",15);

// $equipamentos = $equipamentoRepository->findAll();

// foreach ($equipamentos as $equipamento) {
//     echo $equipamento->nome_equipamento . "<br>";
// }

// $data_atual = date("d/m/Y");
// $data_nova = date("d/m/Y", strtotime("+10 days"));
// echo date("d/m/Y", $data_nova);
// echo "data atual: $data_atual <br>nova data: $data_nova";