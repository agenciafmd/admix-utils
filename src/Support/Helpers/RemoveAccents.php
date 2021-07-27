<?php

namespace Agenciafmd\Admix\Support\Helpers;

use Agenciafmd\Admix\Support\Helpers\Contracts\AbstractMacro;

class RemoveAccents extends AbstractMacro
{
    /**
     * Transforma caracteres com acentos em caracteres sem acento.
     * 
     * @param  string $string
     * @return string
     */
    public function __invoke($string)
    {
        if (is_array($string)) {
            $array = [];

            foreach ($string as $key => $value) {
                $array[$key] = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
            }

            return $array;
        }

        return iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
    }
}
