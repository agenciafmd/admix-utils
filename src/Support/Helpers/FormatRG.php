<?php

namespace Agenciafmd\Admix\Utils\Support\Helpers;

use Agenciafmd\Admix\Utils\Support\Helpers\Contracts\AbstractMacro;

class FormatRG extends AbstractMacro
{
    /**
     * Transforma um RG sem pontuações em um RG com pontuação.
     * 
     * @param  string $rg
     * @return string
     */
    public function __invoke($rg)
    {
        $digit = substr($rg, -1);
        $length = strlen($rg);

        $rg = substr($rg, 0, ($length - 1));
        $rg = strrev($rg);
        $rg = str_split($rg, 3);
        $rg = implode('.', $rg);
        $rg = strrev($rg);

        return "{$rg}-{$digit}";
    }
}
