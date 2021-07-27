<?php

namespace Agenciafmd\Admix\Support\Helpers;

use Agenciafmd\Admix\Support\Helpers\Contracts\AbstractMacro;

class FormatCPF extends AbstractMacro
{
    /**
     * Transforma um CPF pontuação para um CPF com pontuação.
     * 
     * @param  string $cpf
     * @return string
     */
    public function __invoke(string $cpf)
    {
        $digit = substr($cpf, -2);

        $cpf = substr($cpf, 0, (strlen($cpf) - 2));
        $cpf = str_split($cpf, 3);
        $cpf = implode('.', $cpf) . '-' . $digit;

        return $cpf;
    }
}
