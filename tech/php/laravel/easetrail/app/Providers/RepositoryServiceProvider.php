<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $models = [
            'Category',
            'Business',
            'Product',
            'User',
        ];

        foreach ($models as $model) {
            $this->app->bind("App\Domain\\{$model}\\Interfaces\\{$model}Interface", "App\Domain\\{$model}\\Repositories\\{$model}Repository");
        }

    }

    public function boot()
    {
        //
    }

}