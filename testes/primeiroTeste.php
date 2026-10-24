<?php

function testePreencherCampoNome(){
    echo estilo("=== Teste para validar campo que recebe nome ===".PHP_EOL, 'amarelo', 'negrito');

    $nome = 'Gabriel';

    Inputs::acessarPagina();
    Inputs::preencherCampo($nome);

    tratamentoFalhasAssert('falhaCampoNome', 'Campo nome foi preenchido', 'Campo nome não foi preenchido', 5, Inputs::getCampoNome(), 'toHaveValue', $nome);
}

return 'testePreencherCampoNome';