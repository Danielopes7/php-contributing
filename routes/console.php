<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Tasks\UpdateRecentIssues;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    $task = resolve(UpdateRecentIssues::class);
    $task();
    Log::info('UpdateRecentIssues task completed successfully.');
})->hourly();