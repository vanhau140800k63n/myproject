<?php

namespace App\Providers;

use App\Repositories\Eloquent\LessonItemRepository;
use App\Repositories\Eloquent\LessonRepository;
use App\Repositories\Eloquent\PLanguageRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\LessonItemRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
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
        $this->app->singleton(UserRepositoryInterface::class, function () {
            return new UserRepository();
        });
        $this->app->singleton(PLanguageRepositoryInterface::class, function () {
            return new PLanguageRepository();
        });
        $this->app->singleton(LessonRepositoryInterface::class, function () {
            return new LessonRepository();
        });
        $this->app->singleton(LessonItemRepositoryInterface::class, function () {
            return new LessonItemRepository();
        });
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
