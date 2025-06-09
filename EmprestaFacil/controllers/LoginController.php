<?php
class LoginController {

    public function autenticar() {
        require_once 'repositories/UsuarioDAO.php'; //chama o repository para acessar o banco

        $email = $_POST['email'] ?? ''; 
        $senha = $_POST['senha'] ?? '';

        if (empty($email) || empty($senha)) {
            $_SESSION['erro'] = 'Preencha todos os campos.';
            header('Location: index.php?controller=Login&action=mostrarLogin');
            exit;
        }

        $dao = new UsuarioDAO();
        $usuario = $dao->findByEmail($email);

        if (!$usuario) {
            $_SESSION['erro'] = 'Usuário não encontrado.';
            header('Location: index.php?controller=Login&action=mostrarLogin');
            exit;
        }

        if (!password_verify($senha, $usuario->senha)) {
            $_SESSION['erro'] = 'Senha incorreta.';
            header('Location: index.php?controller=Login&action=mostrarLogin');
            exit;
        }

        $_SESSION['usuario'] = [
            'id' => $usuario->id_usuario,
            'nome' => $usuario->nome_usuario,
            'email' => $usuario->email_usuario
        ];

        // Redireciona para dashboard via router
        header('Location: index.php?controller=Dashboard&action=mostrar');
        exit;
    }

    public function mostrarLogin() {
        // session_start();
        include 'views/LoginView.php';
    }
}
