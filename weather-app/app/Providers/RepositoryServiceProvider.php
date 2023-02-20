<?php

namespace App\Providers;

use App\Repositories\CityRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\CityRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
    }
}
