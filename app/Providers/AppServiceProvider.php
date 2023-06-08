<?php

namespace App\Providers;

use App\Repositories\ActionRepositoryInterface;
use App\Repositories\AnswerRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ChallengeRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ContentItemRepositoryInterface;
use App\Repositories\ContentRepositoryInterface;
use App\Repositories\Eloquent\ActionRepository;
use App\Repositories\Eloquent\AnswerRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\ChallengeRepository;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\ContentItemRepository;
use App\Repositories\Eloquent\ContentRepository;
use App\Repositories\Eloquent\LessonItemRepository;
use App\Repositories\Eloquent\LessonRepository;
use App\Repositories\Eloquent\NotiRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Eloquent\PLanguageRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\Eloquent\RankingRepository;
use App\Repositories\Eloquent\TemplateRepository;
use App\Repositories\Eloquent\TemplateTypeRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\LessonItemRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\NotiRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\RankingRepositoryInterface;
use App\Repositories\TemplateRepositoryInterface;
use App\Repositories\TemplateTypeRepositoryInterface;
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
        $this->app->singleton(ContentItemRepositoryInterface::class, function () {
            return new ContentItemRepository();
        });
        $this->app->singleton(CategoryRepositoryInterface::class, function () {
            return new CategoryRepository();
        });
        $this->app->singleton(CommentRepositoryInterface::class, function () {
            return new CommentRepository();
        });
        $this->app->singleton(ActionRepositoryInterface::class, function () {
            return new ActionRepository();
        });
        $this->app->singleton(ContentRepositoryInterface::class, function () {
            return new ContentRepository();
        });
        $this->app->singleton(TemplateRepositoryInterface::class, function () {
            return new TemplateRepository();
        });
        $this->app->singleton(OrderRepositoryInterface::class, function () {
            return new OrderRepository();
        });
        $this->app->singleton(TemplateTypeRepositoryInterface::class, function () {
            return new TemplateTypeRepository();
        });
        $this->app->singleton(NotiRepositoryInterface::class, function () {
            return new NotiRepository();
        });
        $this->app->singleton(RankingRepositoryInterface::class, function () {
            return new RankingRepository();
        });
        $this->app->singleton(ChallengeRepositoryInterface::class, function () {
            return new ChallengeRepository();
        });
        $this->app->singleton(AnswerRepositoryInterface::class, function () {
            return new AnswerRepository();
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
