<?php

namespace Agenciafmd\Admix\Support\Helpers;

use Agenciafmd\Admix\Support\Helpers\Contracts\AbstractMacro;

class IsFullname extends AbstractMacro
{
    /**
     * Verifica se o nome informado é completo, sem abreviações.
     * 
     * @param  string $name
     * @return boolean
     */
    public function __invoke(string $name)
    {
        if (empty($name)) {
            return false;
        }

        // Verifica-se se existe mais de uma palavra.
        $splitedName = explode(' ', $name);

        if (count($splitedName) < 2) {
            return false;
        }

        // Verifica se existe abreviações no nome ou caracteres especiais.
        
        preg_match('/[^[:alpha:]À-ú\s]+|\s[[:alpha:]À-ú]{1}(\s|$)/', $name, $matches);

        if (! empty($matches)) {
            return false;
        }

        return true;
    }
}
