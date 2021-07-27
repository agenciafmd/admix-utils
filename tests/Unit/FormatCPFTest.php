<?php

namespace Agenciafmd\Admix\Test\Unit;

use Agenciafmd\Admix\Test\TestCase;
use Illuminate\Support\Str;

class FormatCPFTest extends TestCase
{
    /**
    * Setup the test environment.
    *
    * @return void
    */
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function successfull_formatation()
    {
        $returnString = Str::formatCPF('12345678900');

        $this->assertTrue($returnString === '123.456.789-00');
    }

    /** @test */
    public function handles_empty_string()
    {
        $returnString = Str::formatCPF('');

        $this->assertTrue($returnString === '-');
    }

    /** @test */
    public function handles_numeric_values()
    {
        $returnString = Str::formatCPF(12345678900);

        $this->assertTrue($returnString === '123.456.789-00');
    }
}