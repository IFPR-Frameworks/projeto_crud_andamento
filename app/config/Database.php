<?php

require_once __DIR__ . '/../../config.php';

class Database
{

    private $host = 'localhost';
    private $dbname = DATABASE_NAME;
    private $user   = DATABASE_USER;
    private $pass   = DATABASE_PASSWORD;

    public function getConnection()
    {

        try {

            $conn = new PDO("mysql:host=" . $this->host . "; dbname=" . $this->dbname, $this->user, $this->pass);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }

        return $conn;
    }
}
