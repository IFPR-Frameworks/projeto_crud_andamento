<?php

require __DIR__ . '/../dao/LivroDAO.php';
require __DIR__ . '/../dao/AutorDAO.php';

class LivroController {
    private $livroDAO;
    private $autorDAO;

    public function __construct() {
        $this->livroDAO = new LivroDAO();
        $this->autorDAO = new AutorDAO();
    }

    //se não informar nenhum método, o index é chamado
    public function index() {
        $livros = $this->livroDAO->findAll();
        include __DIR__ . '/../views/livro/index.php';
    }

    public function show($id) {
        $livro = $this->livroDAO->findById($id);
        include __DIR__ . '/../views/livro/show.php';
    }

    public function create() {
        $autores = $this->autorDAO->findAll(); // Para selecionar o autor do livro
        include __DIR__ . '/../views/livro/create.php';
    }

    public function store($titulo, $autorId) {
        $livro = new Livro();
        $livro->setTitulo($titulo);
        $livro->setAutorId($autorId);
        $this->livroDAO->create($livro);
        header("Location: /livros");
    }

    public function edit($id) {
        $livro = $this->livroDAO->findById($id);
        $autores = $this->autorDAO->findAll(); // Para selecionar o autor do livro
        include __DIR__ . '/../views/livro/edit.php';
    }

    public function update($id, $titulo, $autorId) {
        $livro = new Livro();
        $livro->setId($id);
        $livro->setTitulo($titulo);
        $livro->setAutorId($autorId);
        $this->livroDAO->update($livro);
        header("Location: /livros");
    }

    public function delete($id) {
        $this->livroDAO->delete($id);
        header("Location: /livros");
    }
}
