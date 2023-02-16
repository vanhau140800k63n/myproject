<?php

namespace App\Providers;

use App\Models\ContentItem;
use App\Repositories\Eloquent\ContentItemRepository;
use App\Repositories\Eloquent\LessonItemRepository;
use App\Repositories\Eloquent\LessonRepository;
use App\Repositories\Eloquent\PLanguageRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\LessonItemRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
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
        $this->app->singleton(PostRepositoryInterface::class, function () {
            return new PostRepository();
        });
        $this->app->singleton(ContentItemRepository::class, function () {
            return new ContentItem();
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
