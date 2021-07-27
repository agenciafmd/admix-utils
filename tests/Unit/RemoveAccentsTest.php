<?php

namespace Agenciafmd\Admix\Test\Unit;

use Agenciafmd\Admix\Test\TestCase;
use Illuminate\Support\Str;

class RemoveAccentsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function successfull_formatation()
    {
        $returnString = Str::removeAccents('áÁóéÉü');

        $this->assertTrue($returnString === 'aAoeEu');
    }
}