<?php

declare(strict_types=1);


namespace App\Providers;

use App\Factories\PostDTOFactory;
use App\Factories\UserDTOFactory;
use Illuminate\Support\ServiceProvider;

class FactoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            PostDTOFactory::class,
            PostDTOFactory::class
        );

        $this->app->bind(
            UserDTOFactory::class,
            UserDTOFactory::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
