<?php

function tiraPrint(string $print){
    $GLOBALS['page']->screenshot(__DIR__."/../artifacts/$print.png");
}
