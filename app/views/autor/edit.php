<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- app/views/autor/create.php -->
<h1>Editar Autor {<?= $autor->getNome() ?>}</h1>

<form action="http://localhost/Frameworks/projeto-crud/AutorController/update?" method="post">
    <label>Nome: </label>
    <input type="hidden" value="<?= $autor->getId() ?>" name="id">
    <input type="text" value="<?= $autor->getNome() ?>" name="nome">
    <button type="submit">Salvar</button>
</form>

<a href="http://localhost/Frameworks/projeto-crud/AutorController">Voltar</a>

    
</body>
</html>