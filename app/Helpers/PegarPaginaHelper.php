<?php

namespace App\Helpers;

class PegarPaginaHelper {
        
    public static function pegarPagina() {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $nomePag = (string) $url[1];
        return $nomePag;
    }
    
}