<?php

require_once __DIR__ . '/../models/Livro.php';
require_once __DIR__ . '/../config/Database.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findAll() {
        $stmt = $this->conn->query("SELECT * FROM livros");
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Livro::class);
    }

    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject(Livro::class);
    }

    public function create(Livro $livro) {
        $stmt = $this->conn->prepare("INSERT INTO livros (titulo, autor_id) VALUES (?, ?)");
        $stmt->execute([$livro->getTitulo(), $livro->getAutorId()]);
    }

    public function update(Livro $livro) {
        $stmt = $this->conn->prepare("UPDATE livros SET titulo = ?, autor_id = ? WHERE id = ?");
        $stmt->execute([$livro->getTitulo(), $livro->getAutorId(), $livro->getId()]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM livros WHERE id = ?");
        $stmt->execute([$id]);
    }
}