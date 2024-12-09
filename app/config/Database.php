<?php

class Database
{

    private $host = 'localhost';
    private $dbname = 'biblioteca_crud';
    private $user = 'root';
    private $pass = 'bancodedados';

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
