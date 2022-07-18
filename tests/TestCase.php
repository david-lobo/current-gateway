<?php

namespace JJSoftwareLtd\CurrentGateway\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use JJSoftwareLtd\CurrentGateway\CurrentGatewayServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'JJSoftwareLtd\\CurrentGateway\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            CurrentGatewayServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_current-gateway_table.php.stub';
        $migration->up();
        */
    }
}
