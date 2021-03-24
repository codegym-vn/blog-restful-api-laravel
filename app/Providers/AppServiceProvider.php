<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Impl\PostRepository;
use App\Repositories\PostRepositoryImpl;
use App\Repositories\Repository;
use App\Services\Impl\PostService;
use App\Services\PostServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Repository::class, EloquentRepository::class);

        $this->app->singleton(PostServiceImpl::class, PostService::class);
        $this->app->singleton(PostRepositoryImpl::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
