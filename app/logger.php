<?php

# Arquivo responsável por registrar saidas do terminal em '/../log.ansi'.

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Process\Process;

$log = fopen(__DIR__.'/../log.ansi', 'ab');

# Gerando o cabeçalho com a data e horário da execução
$dataHora = date('d/m/Y H:i:s');
$cabecalho = "\n" . str_repeat('=', 55) . "\n";
$cabecalho .= " Sequência de testes iniciada em: {$dataHora}\n";
$cabecalho .= str_repeat('=', 55) . "\n\n";

# Escreve o cabeçalho tanto no terminal quanto no arquivo de log
fwrite(STDOUT, $cabecalho);
fwrite($log, $cabecalho);

$process = new Process([PHP_BINARY, __DIR__.'/index.php']);
$process->setTimeout(null);

$process->run(function (string $type, string $buffer) use ($log): void {
    fwrite(STDOUT, $buffer);
    fwrite($log, $buffer);
});

fclose($log);
exit($process->getExitCode() ?? 1);