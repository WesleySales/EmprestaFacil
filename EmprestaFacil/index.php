<?php

session_start();

require_once 'Router.php';

$router = new Router();
$router->handleRequest();
// session_start();
// include_once 'views/loginView.php';

// // echo "AQUI VAI FICAR MEU PRIMEIRO PROJETO FODA COM PHP<br><br>";

// include 'services/UsuarioService.php';
// include 'repositories/EmprestimoDAO.php';
// include 'services/EquipamentoService.php'; -->

// $empRepo = new EmprestimoDAO();

// $empRepo-> create(2,2);

// $service = new UsuarioService();
// $service->cadastrarUsuario("Wesley","Wesley@gmail.com","1234");
// $equipamentoService = new EquipamentoService();
// $emprestimoService = new EmprestimoService();

// $emprestimoService->create(1,2);


// echo $service->listarUsuarios();

// $equipamentoService->cadastrarEquipamento("Furadeira",10);
// $equipamentoService->cadastrarEquipamento("Martelo",15);

// $equipamentos = $equipamentoRepository->findAll();

// foreach ($equipamentos as $equipamento) {
//     echo $equipamento->nome_equipamento . "<br>";
// }

// $data_atual = date("d/m/Y");
// $data_nova = date("d/m/Y", strtotime("+10 days"));
// echo date("d/m/Y", $data_nova);
// echo "data atual: $data_atual <br>nova data: $data_nova"; -->