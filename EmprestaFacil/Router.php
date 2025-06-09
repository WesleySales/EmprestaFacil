<?php

class Router {

    public function handleRequest() {
        $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'LoginController';
        $actionName = $_GET['action'] ?? 'mostrarLogin';

        $controllerFile = "controllers/{$controllerName}.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $actionName)) {
                    $controller->$actionName();
                } else {
                    $this->error("Método '$actionName' não encontrado no controller '$controllerName'.");
                }

            } else {
                $this->error("Controller '$controllerName' não encontrado.");
            }

        } else {
            $this->error("Arquivo '$controllerFile' não existe.");
        }
    }

    private function error($msg) {
        echo "<h3>Erro de Roteamento</h3><p>$msg</p>";
    }
}
