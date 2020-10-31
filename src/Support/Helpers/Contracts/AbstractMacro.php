<?php

namespace Agenciafmd\Admix\Utils\Support\Helpers\Contracts;

use RuntimeException;

abstract class AbstractMacro
{
    /**
     * Retorna a instância do objeto.
     * 
     * @return static
     */
    public static function make()
    {
        if (! method_exists(static::class, '__invoke')) {
            throw new RuntimeException('Método __invoke() não implementado em ' . static::class);
        }

        return new static();
    }
}
