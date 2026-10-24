<?php

use Playwright\Locator\LocatorInterface;
use Playwright\Page\PageInterface;

class Inputs{

    # === Elementos ===

    private static LocatorInterface|PageInterface $campoNome;

    # === Locators ===

    public static function localizarElementos(){
        self::$campoNome = $GLOBALS['page']->getByPlaceholder('Enter your name');
    }

    # === Ações ===
    
    public static function acessarPagina(){
        $GLOBALS['page']->goto($GLOBALS['url'].'/#inputs');
        self::localizarElementos();
    }

    public static function preencherCampo($name){
        self::$campoNome->fill($name);
    }

    # === Getters ===

    public static function getCampoNome(){
        return self::$campoNome;
    }
}

