<?php

require __DIR__ . '/../dao/AutorDAO.php';

class AutorController {

    private $autorDAO;

    public function __construct() {
        $this->autorDAO = new AutorDAO();
    }

    public function index() {
        $autores = $this->autorDAO->findAll();
        include __DIR__ . '/../views/autor/index.php';
    }

    public function show() {

        //.../AutorController/show/?id=1
        $id = $_GET['id'];//1 

        $autor = $this->autorDAO->findById($id);

        include __DIR__ . '/../views/autor/show.php';
    }

    public function create() {
        include __DIR__ . '/../views/autor/create.php';
    }

    public function store() {

        //$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        $nome = $_POST['campo_nome_autor'];

        $autor = new Autor();
        $autor->setNome($nome);
        $this->autorDAO->create($autor);
        header("location: http://localhost/Frameworks/projeto-crud/AutorController");
    }

    public function edit($id) {

        $id = $_GET['id'];
        $autor = $this->autorDAO->findById($id);
        include __DIR__ . '/../views/autor/edit.php';
    }

    public function update($id, $nome) {

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        
        $autor = new Autor();
        $autor->setId($id);
        $autor->setNome($nome);
        $this->autorDAO->update($autor);
        header("location: http://localhost/Frameworks/projeto-crud/AutorController");
    }

    public function delete() {

        $id = $_GET['id'];

        $this->autorDAO->delete($id);
        header("location: http://localhost/Frameworks/projeto-crud/AutorController");

    }

}
