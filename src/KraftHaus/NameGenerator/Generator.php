<?php

namespace KraftHaus\NameGenerator;

/*
 * This file is part of the NameGenerator package.
 *
 * (c) KraftHaus <hello@krafthaus.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Config\Repository;

class Generator
{

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * @param  Repository  $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function generate(int $words = 2, string $glue = ' '): string
    {
        return implode($glue, $this->raw($words));
    }

    /**
     * Generate an array of random words filled with adjectives and a noun.
     *
     * @param  int  $words
     * @return array
     */
    public function raw(int $words = 2): array
    {
        $adjectives = $this->repository->get('name-generator.adjectives');
        $nouns = $this->repository->get('name-generator.nouns');

        $raw = [];

        for ($i = 1; $i < $words; $i++) {
            $raw[] = $adjectives[rand(0, sizeof($adjectives) -1)];
        }

        $raw[] = $nouns[rand(0, sizeof($nouns) -1)];

        return $raw;
    }
}
