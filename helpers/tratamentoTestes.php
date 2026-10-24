<?php

use function Playwright\Testing\expect;
use Playwright\Locator\LocatorInterface;
use Playwright\Page\PageInterface;

# ... antes do último parâmetro o torna um parâmetro variádico
# Todos os argumentos separados por vírgulas enviados depois de $assertion
# Ficarão em um array dentro de $params.
function tratamentoFalhasAssert(string $printFalha, string $msgSucesso, string $msgFalha, int $timeout, LocatorInterface|PageInterface $interface, string $assertion, ...$assertArgs){
    try{
        # Já ... como argumento serve para desempacotar um array.
        expect($interface)->withTimeout($timeout * 1000)->$assertion(...$assertArgs);
        echo estilo('PASSOU: ','verde','negrito').$msgSucesso.PHP_EOL;
        return true;
    }
    catch(\Throwable $e){
        echo estilo('FALHOU: ','vermelho','negrito').get_class($e)." -> ".$e->getMessage()." -> $msgFalha".PHP_EOL;
        sleep(1);
        tiraPrint($printFalha);
        $GLOBALS['falhas'] += 1;
        return false;
    }
}

# Para enviar uma função como argumento de um parâmetro 'callable' utiliza-se 'fn() => nomeFunção()'
function tratamentoFalhasAcao(string $printFalha, string $msgSucesso, string $msgFalha, callable $action, ...$actionArgs){
    try{
        $action(...$actionArgs);
        echo estilo('PASSOU: ','verde','negrito').$msgSucesso.PHP_EOL;
        return true;
    }
    catch(\Throwable $e){
        echo estilo('FALHOU: ','vermelho','negrito').get_class($e)." -> ".$e->getMessage()." -> $msgFalha".PHP_EOL;
        sleep(1);
        tiraPrint($printFalha);
        $GLOBALS['falhas'] += 1;
        return false;
    }
}