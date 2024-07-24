<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GitHubApi;
use GrahamCampbell\GitHub\GitHubManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GitHubApi::class, function ($app) {
            $github = $app->make(GitHubManager::class);
            return GitHubApi::getInstance($github);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
