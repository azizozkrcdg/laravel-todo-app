<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Task;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.header', function ($view) {

            $taskCount = Task::count();
            $completedCount = Task::where('task_status', 1)->count();
            $unCompletedCount = Task::where('task_status', 0)->count();
            $view->with([
                'taskCount' => $taskCount,
                'completedCount' => $completedCount,
                'unCompletedCount' => $unCompletedCount
            ]);
        });
    }
}
