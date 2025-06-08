<?php
class ConexaoMySQL {
    private static $instancia;
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";

    public static function getConexao() {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new PDO(
                    "mysql:host=" . self::$servername . ";dbname=empresta_facil;charset=utf8",
                    self::$username,
                    self::$password
                );
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro na conexão: ' . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}
