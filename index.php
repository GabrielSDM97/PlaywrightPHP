<?php

# Importando funcionalidades do Playwright
require __DIR__.'/vendor/autoload.php';
# Importando POMs
require __DIR__.'/POM/Inputs.php';
# Importando helpers
require __DIR__.'/helpers/printscreen.php';
require __DIR__.'/helpers/tratamentoTestes.php';
require __DIR__.'/helpers/estiloTexto.php';

use Playwright\Playwright;

$context = Playwright::chromium([
    'headless' => true,
    'context' => [
        'viewport'=> ['width' => 1280, 'height' => 720],
    ]
]);

$page = $context->newPage();

$url = 'https://qapracticehub.com/';

$falhas = 0;

// A função 'glob()' retorna um array com strings de todos os caminhos que casam com o padrão passado em seu parâmetro.
foreach (glob(__DIR__.'/testes/*Teste.php') as $file) {
    $test = require $file; // 'require' aqui não só importa a função do arquivo como também atribui o valor do 'return' do arquivo
    $test();
    $context->clearCookies(); # Limpa cookies do navegador entre testes.
}

#TODO Enviar falhas para um arquivo de log, exemplo: 'echo > logFalhasE2E.txt'.

try{
    if($falhas)
        throw new Exception(estilo( $falhas == 1 ? "$falhas falha detectada " : "$falhas falhas detectadas ",
                                    'vermelho', 'negrito')."durante a execução dos testes! Verifique o arquivo de log para mais detalhes!");
} 
finally {
    $context->close();
}
