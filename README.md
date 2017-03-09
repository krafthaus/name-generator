# Name Generator for Laravel

[![Total Downloads](https://poser.pugx.org/krafthaus/name-generator/downloads.png)](https://packagist.org/packages/krafthaus/name-generator)
[![Build Status](https://img.shields.io/travis/krafthaus/name-generator/master.svg?style=flat-square)](https://travis-ci.org/krafthaus/name-generator)
[![License](https://poser.pugx.org/krafthaus/name-generator/license.png)](https://packagist.org/packages/krafthaus/name-generator)

## Installation

Add name-generator to your composer.json file:

```
"require": {
    "krafthaus/name-generator": "^1.0"
}
```

Use composer to install the package:

```
$ composer update
```

Register the package:

```
'providers' => [
    // ...
    KraftHaus\NameGenerator\NameGeneratorServiceProvider::class,
]
```

Publish the configuration files:

```
$ php artisan vendor:publish --provider="KraftHaus\NameGenerator\NameGeneratorServiceProvider" --tag=config
```

## Usage

#### Generate a string of random words:

```php
$words = KraftHaus\NameGenerator\Facades\Generator::generate();
// output: word1 word2

// Or define the amount of words you'd like to output:
$words = KraftHaus\NameGenerator\Facades\Generator::generate(5);
// output: word1 word2 word3 word4 word5

// With the glue parameter:
$words = KraftHaus\NameGenerator\Facades\Generator::generate(3, '-');
// output: word1-word2-word3
```

#### Generate an array of random words:

```php
$words = KraftHaus\NameGenerator\Facades\Generator::raw();
// output: ['word1', 'word2'];

// Or define the amount of words you'd like to output:
$words = KraftHaus\NameGenerator\Facades\Generator::raw(4);
// output: ['word1', 'word2', 'word3', 'word4'];
```

## License

This package is available under the [MIT license](https://github.com/krafthaus/name-generator/blob/master/LICENSE).

Copyright (c) 2017 KraftHaus