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

use Illuminate\Support\ServiceProvider;

class NameGeneratorServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/adjectives.php' => config_path('name-generator/adjectives.php'),
            __DIR__.'/../../config/nouns.php' => config_path('name-generator/nouns.php')
        ], 'config');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/adjectives.php', 'name-generator.adjectives');
        $this->mergeConfigFrom(__DIR__.'/../../config/nouns.php', 'name-generator.nouns');

        $this->registerServices();
    }

    /**
     * Register the package services.
     */
    protected function registerServices()
    {
        $this->app->singleton('name-generator', function ($app): Generator {
            return new Generator($app['config']);
        });
    }
}