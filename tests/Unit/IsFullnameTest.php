<?php

namespace Agenciafmd\Admix\Utils\Test\Unit;

use Agenciafmd\Admix\Utils\Rules\FullnameRule;
use Agenciafmd\Admix\Utils\Test\TestCase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class IsFullnameTest extends TestCase
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

    protected function invalidNames()
    {
        return [
            'Maya F. M. Teixeira',
            'Kamilly E Nogueira',
            'Clara de Paula!',
            '?Tomás Caio Geraldo Porto',
            'Danilo #Arthur Galvão',
            'Nina_Fátima_Rebeca_Lima',
            'rebeca-marlene-castro',
            'ianNoahRenanNascimento',
            'Helena J V da Cruz',
            'Márcio N',
            'Liz Drumond 69',
            'Rosa Lavínia Martins10',
            'yago.pires@mail.com',
            'Marcos V. C. V. Silva',
            'Joana L Maya Silva',
            'Cláudio sk8',
            '',
        ];
    }

    protected function validNames()
    {
        return [
            'Liz Lúcia Raimunda Aragão',
            'Teresinha Marcela das Neves',
            'Regina Sara Teresinha Rezende',
            'Caio Davi Augusto Oliveira',
            'Valentina Vera Barros',
            'Luana Nina Costa',
            'Henry Nathan Gabriel de Paula',
            'Fernando Iago Baptista',
            'Ana Nina Souza',
            'Elias Joaquim Teixeira',
            'Giovanni Vinicius Otávio Rodrigues',
            'Alessandra Amanda Clarice de Paula',
            'Arthur Erick Farias',
            'Pietro Manoel Pedro Henrique da Rosa',
            'Benedita Hadassa Sophie Moreira',
            'Liz Jennifer Simone da Silva',
            'Luís Luan Baptista',
            'Marcelo Eduardo Paulo Porto',
            'Flávia Esther Isabelly Dias',
            'César Iago Gomes',
            'Juliana Bruna Laís da Paz',
            'Marli Rosa Lopes',
            'Daniel Theo Nogueira',
            'Stefany Juliana Araújo',
            'Julio Fábio Fernando Assis',
            'Elza Daniela Bruna Nogueira',
            'Isabela Isabel Catarina Pires',
            'Caroline Ana Cecília Rocha',
            'Natália Letícia Silva',
            'Luana Jaqueline Baptista',
        ];
    }

    /** @test */
    public function all_is_valid_names()
    {
        foreach ($this->validNames() as $name) {
            $this->assertTrue(Str::isFullname($name));
        }
    }

    /** @test */
    public function all_is_invalid_names()
    {
        foreach ($this->invalidNames() as $name) {
            $this->assertFalse(Str::isFullname($name));
        }
    }

    /** @test */
    public function can_be_used_in_validations()
    {
        $rules = [
            'required',
            new FullnameRule
        ];

        foreach ($this->validNames() as $name) {
            $validator = Validator::make(
                ['fullname' => $name],
                ['fullname' => $rules]
            );

            $this->assertFalse($validator->fails());
        }

        foreach ($this->invalidNames() as $name) {
            $validator = Validator::make(
                ['fullname' => $name],
                ['fullname' => $rules]
            );

            $this->assertTrue($validator->fails());
        }
    }

    /** @test */
    public function helper_can_be_used()
    {
        foreach ($this->validNames() as $name) {
            $this->assertTrue(isFullname($name));
        }

        foreach ($this->invalidNames() as $name) {
            $this->assertFalse(isFullname($name));
        }
    }
}
