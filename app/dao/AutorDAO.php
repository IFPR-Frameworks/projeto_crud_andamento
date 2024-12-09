<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Autor.php';

class AutorDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findAll() {
        $stmt = $this->conn->query("SELECT * FROM autores");
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Autor::class);
    }

    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM autores WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject(Autor::class);
    }

    public function create(Autor $autor) {
        $stmt = $this->conn->prepare("INSERT INTO autores (nome) VALUES (?)");
        $stmt->execute([$autor->getNome()]);
    }

    public function update(Autor $autor) {
        $stmt = $this->conn->prepare("UPDATE autores SET nome = ? WHERE id = ?");
        $stmt->execute([$autor->getNome(), $autor->getId()]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM autores WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
