<?php

use App\Tasks\UpdateRecentIssues;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    $task = resolve(UpdateRecentIssues::class);
    $task();
    Log::info('UpdateRecentIssues task completed successfully.');
})->hourly();
