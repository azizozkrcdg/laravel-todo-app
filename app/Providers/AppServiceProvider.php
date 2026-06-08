<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Task;


class AppServiceProvider extends ServiceProvider
{
    
    public function boot(): void
    {
        View::composer('layouts.header', function ($view) {

            if (!auth()->check()) {
                $view->with([
                    "taskCount" => 0,
                    "completedCount" => 0,
                    "unCompletedCount" => 0
                ]);

                return;
            }

            $userId = auth()->id();

            $taskCount = Task::where("user_id", $userId)
                ->count();
            $completedCount = Task::where("user_id", $userId)
                ->where("task_status", 1)
                ->count();
            $unCompletedCount = Task::where("user_id", $userId)
                ->where("task_status", 0)
                    ->count();

            $view->with([
                'taskCount' => $taskCount,
                'completedCount' => $completedCount,
                'unCompletedCount' => $unCompletedCount
            ]);
        });
    }
}
