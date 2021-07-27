<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;

class FormatRGTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function successfull_formatation()
    {
        $returnString = Str::formatRG('123456789');

        $this->assertTrue($returnString === '12.345.678-9');
    }

    /** @test */
    public function handles_empty_string()
    {
        $returnString = Str::formatRG('');

        $this->assertTrue($returnString === '-');
    }

    /** @test */
    public function handles_numeric_values()
    {
        $returnString = Str::formatRG(123456789);

        $this->assertTrue($returnString === '12.345.678-9');
    }
}