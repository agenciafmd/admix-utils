<?php

namespace Agenciafmd\Admix\Test\Unit;

use Agenciafmd\Admix\Rules\MajorAgeRule;
use Agenciafmd\Admix\Test\TestCase;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Validator;

class MajorAgeTest extends TestCase
{
    /** @var \Faker\Generator $faker */
    private $faker;

    /**
    * Setup the test environment.
    *
    * @return void
    */
    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = FakerFactory::create('pt_br');

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function validates_major_age_dates()
    {
        $rules = ['birthDate' => new MajorAgeRule];

        for ($i = 50; $i > 0; $i--) {
            $data = [
                'birthDate' => $this->faker
                    ->dateTimeBetween('-80 years', now()->subYears(18))
                    ->format('d/m/Y')
                ];

            $validator = Validator::make($data, $rules);

            $this->assertTrue($validator->passes());
        }
    }

    /** @test */
    public function validates_under_age_dates()
    {
        $rules = ['birthDate' => new MajorAgeRule];
        $messages = [];
        $attributes = ['birthDate' => 'data de nascimento'];

        for ($i = 50; $i > 0; $i--) {
            $data = [
                'birthDate' => $this->faker
                    ->dateTimeBetween('-17 years')
                    ->format('d/m/Y')
                ];

            $validator = Validator::make($data, $rules, $messages, $attributes);

            $this->assertTrue($validator->fails());

            $this->assertTrue($validator->getMessageBag()->has('birthDate'));

            $this->assertTrue(
                $validator->getMessageBag()->get('birthDate')[0] == array_values($attributes)[0] . ' deve ter mais de 18 anos'
            );
        }
    }

    /** @test */
    public function handles_different_date_formats()
    {
        $dateFormats = [
            'Y-m-d',
            'Ymd',
            'd/m/Y',
            'dmY',
            'm/d/Y',
            'mdY',
            'Y-m-d H:m',
            'YmdHm',
            'Y-m-d H:m:i',
            'YmdHmi',
        ];
        
        for ($i = 50; $i > 0; $i--) {
            $dateFormat = $this->faker->randomElement($dateFormats);

            $data = ['birthDate' => $this->faker->dateTimeBetween()->format($dateFormat)];
            $rules = ['birthDate' => new MajorAgeRule($dateFormat)];

            $validator = Validator::make($data, $rules);

            $this->assertIsBool($validator->passes());
        }
    }
}
