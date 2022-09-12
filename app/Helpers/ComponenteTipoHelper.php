<?php

namespace App\Helpers;

class ComponenteTipoHelper {

    public static $tipos = [
        1 => 'Troca vertical',
        2 => 'Texto simples',
        3 => 'Troca vertical invertido',
        4 => 'Banner Zoom',
        5 => 'Carrossel de conteudo',
        6 => 'Formulario com links',
        7 => 'Banner Simples',
    ];
    
    private static $tiposMultiplos = [5, 6];

    public static function isMultiplo($tipo) {
        return in_array($tipo, self::$tiposMultiplos);
    }

}

?>