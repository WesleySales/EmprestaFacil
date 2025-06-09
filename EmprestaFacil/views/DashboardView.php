<?php
// session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$nomeUsuario = $_SESSION['usuario']['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Menu Principal - EmprestaFácil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding-top: 30px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }

        .header {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4">EmprestaFácil</h4>
        <hr style="border-color: #6c757d;">
        <a href="index.php?controller=equipamento&action=exibir">📦 Ver Equipamentos</a>
        <a href="controllers/EmprestimoController.php?action=form">📄 Realizar Empréstimo</a>
        <a href="logout.php">🚪 Sair</a>
    </div>

    <!-- Conteúdo principal -->
    <div class="main-content">
        <div class="header">
            <h3>Bem-vindo, <?= htmlspecialchars($nomeUsuario) ?>!</h3>
            <p>Escolha uma opção no menu à esquerda para continuar.</p>
        </div>
    </div>

</body>
</html>
