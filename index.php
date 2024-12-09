<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Função de autoload para carregar controladores
// Exmplicação:
// - Quando o PHP detecta o uso de uma classe que não está disponível, ele chama a função registrada. 
// - Dentro dela, você pode especificar a lógica para localizar e carregar o arquivo que contém a classe.
spl_autoload_register(function ($className) {
    $file = __DIR__ . '/app/controllers/' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Captura a URL requisitada
$url = trim($_SERVER['REQUEST_URI'], '/');

// Divide a URL em partes
$urlParts = explode('/', $url);

// Define controlador padrão
$controllerName = $urlParts[2] ?? 'AutorController';

// Define método padrão
$methodName = isset($urlParts[3]) ? explode('?', $urlParts[3])[0] : 'index';

// Define argumentos (se houver)
$args = array_slice($urlParts, 2);

try {
    // Verifica se o controlador existe
    if (!class_exists($controllerName)) {
        throw new Exception("Controlador '{$controllerName}' não encontrado.");
    }

    // Instancia o controlador
    $controller = new $controllerName();

    // Verifica se o método existe
    if (!method_exists($controller, $methodName)) {
        throw new Exception("Método '$methodName' não encontrado no controlador '$controllerName'.");
    }

    // Chama o método com os argumentos
    call_user_func_array([$controller, $methodName], $args);

} catch (Exception $e) {
    // Mostra mensagem de erro simples
    http_response_code(404);
    echo $e->getMessage();
}
