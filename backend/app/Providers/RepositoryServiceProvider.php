<?php

namespace App\Providers;

use App\Repository\News\NewsRepository;
use App\Repository\News\NewsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
    }
}
