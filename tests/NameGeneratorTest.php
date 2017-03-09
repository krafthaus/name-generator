<?php

/*
 * This file is part of the NameGenerator package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Orchestra\Testbench\TestCase;
use KraftHaus\NameGenerator\Facades\Generator;
use KraftHaus\NameGenerator\NameGeneratorServiceProvider;

class NameGeneratorTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [NameGeneratorServiceProvider::class];
    }

    /** @test */
    function that_raw_outputs_an_array()
    {
        $this->assertInternalType('array', Generator::raw());
    }

    /** @test */
    function that_generate_outputs_a_string()
    {
        $this->assertInternalType('string', Generator::generate());
    }

    /** @test */
    function that_raw_outputs_the_right_amount_of_words()
    {
        $this->assertCount(2, Generator::raw());
        $this->assertCount(3, Generator::raw(3));
        $this->assertCount(4, Generator::raw(4));

//        $amount = rand(1, 100);
//        $this->assertCount($amount, Generator::raw($amount));
    }

    /** @test */
    function that_generate_ouputs_the_right_amount_of_words()
    {
        $this->assertCount(2, explode(' ', Generator::generate(2)));
        $this->assertCount(3, explode(' ', Generator::generate(3)));
        $this->assertCount(4, explode(' ', Generator::generate(4)));

//        $amount = rand(1, 100);
//        $this->assertCount($amount, explode(' ', Generator::generate($amount)));
    }

    /** @test */
    function that_glue_works_on_generate()
    {
        $this->assertRegExp('/[a-z]+-[a-z]+/', Generator::generate(2, '-'));
        $this->assertRegExp('/[a-z]+\_[a-z]+/', Generator::generate(2, '_'));
    }
}