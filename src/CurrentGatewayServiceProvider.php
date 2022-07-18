<?php

namespace JJSoftwareLtd\CurrentGateway;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CurrentGatewayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('current-gateway')
            ->hasConfigFile();
    }

    public function registeringPackage()
    {
        $this->app->bind('current-gateway', function () {
            return new CurrentGateway();
        });
    }
}
