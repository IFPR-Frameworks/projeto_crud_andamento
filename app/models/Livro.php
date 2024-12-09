<?php
class Livro
{

    private $id;
    private $titulo;
    private $autorId;

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getAutorId()
    {
        return $this->autorId;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setAutorId($autorId)
    {
        $this->autorId = $autorId;
    }
}
