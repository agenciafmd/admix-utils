<?php

namespace Agenciafmd\Admix\Utils\Support\Helpers;

use Agenciafmd\Admix\Utils\Support\Helpers\Contracts\AbstractMacro;

class OnlyNumbers extends AbstractMacro
{
    /**
     * Remove todos os caracteres não númericos.
     * 
     * @param  string $string
     * @return string
     */
    public function __invoke($string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }
}
