<?php

namespace Tests;

use Agenciafmd\Admix\Providers\AdmixUtilsServiceProvider;
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
