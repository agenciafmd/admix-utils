<?php

namespace Agenciafmd\Admix\Test\Unit;

use Agenciafmd\Admix\Test\TestCase;
use Illuminate\Support\Str;

class OnlyNumbersTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function successfull_formatation()
    {
        $returnString = Str::onlyNumbers('ABC123d4e5f6!77@88#$%9');

        $this->assertTrue($returnString === '12345677889');
    }

    /** @test */
    public function handles_empty_string()
    {
        $returnString = Str::onlyNumbers('');

        $this->assertTrue($returnString === '');
    }

    /** @test */
    public function handles_numeric_values()
    {
        $returnString = Str::onlyNumbers(1234567890);

        $this->assertTrue($returnString === '1234567890');
    }
}