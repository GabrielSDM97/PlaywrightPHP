<?php

function estilo(string $texto, string $cor, ...$estilos){
    $cores = ['vermelho' => "\033[31",
              'verde' => "\033[32",
              'amarelo' => "\033[33",
              'branco' => "\033[37",
              'ciano' => "\033[96"];

    $estilosOpcoes = ['negrito' => ";1",
                      'italico' => ";3"];

    $estiloString = '';

    foreach($estilos as $estilo){
        $estiloString .= $estilosOpcoes[$estilo];
    }

    return $cores[$cor].$estiloString."m".$texto."\033[m";
}