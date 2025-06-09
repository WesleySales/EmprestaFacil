<?php
// session_start();

require_once 'services/EquipamentoService.php';

// if (!isset($_SESSION['usuario'])) {
//     header("Location: index.php");
//     exit();
// }

$service = new EquipamentoService();

$equipamentos = $service->listarEquipamentos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Equipamentos Disponíveis - EmprestaFácil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2>Equipamentos Disponíveis</h2>
        <div class="row g-3 mt-3">
            <?php foreach($equipamentos as $eq): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($eq->nome_equipamento) ?></h5>
                            <p class="card-text">Quantidade disponível: <strong><?= $eq->quantidade_total ?></strong></p>
                            <a href="controllers/EmprestimoController.php?action=reservar&id=<?= $eq->id_equipamento ?>" 
                               class="btn btn-primary <?= $eq->quantidade == 0 ? 'disabled' : '' ?>">
                               Reservar
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-4">
            <a href="index.php?controller=Dashboard&action=mostrar" class="btn btn-secondary">Voltar ao Menu</a>
        </div>
    </div>
</body>
</html>
