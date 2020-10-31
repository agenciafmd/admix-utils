<?php

namespace Agenciafmd\Admix\Utils\Test;

use Agenciafmd\Admix\Utils\Providers\AdmixUtilsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            AdmixUtilsServiceProvider::class,
        ];
    }
}
