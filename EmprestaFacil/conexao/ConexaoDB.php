<?php
class ConexaoDB{
    private static $instancia;
    private static $host = "localhost";
    private static $dbname = "empresta_facil";
    private static $username = "postgres"; // altere se necessário
    private static $password = "sales1226"; // coloque sua senha aqui
    private static $port = "5432"; // porta padrão do PostgreSQL

    public static function getConexao() {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new PDO(
                    "pgsql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname,
                    self::$username,
                    self::$password
                );
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
                die('Erro na conexão: ' . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}
