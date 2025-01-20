<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <!-- app/views/autor/index.php -->
    <h1>Lista de Autores</h1>
    <a href="http://localhost/Frameworks/projeto-crud/AutorController/create">Novo Autor</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($livros as $livro): ?>
            <tr>
                <td><?= $livro->getId(); ?></td>
                <td><a href="http://localhost/Frameworks/projeto-crud/AutorController/show/?id=<?= $livro->getId(); ?>"><?= $livro->getNome(); ?></a></td>
                <td>
                    <a href="http://localhost/Frameworks/projeto-crud/AutorController/edit?id=<?= $livro->getId(); ?>">Editar</a>
                    <a href="http://localhost/Frameworks/projeto-crud/AutorController/delete?id=<?= $livro->getId(); ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>