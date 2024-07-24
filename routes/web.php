<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;
use GrahamCampbell\GitHub\Facades\GitHub;

// Route::get('/good-first-issue', function () {
//     // $response = GitHub::repo()->show('GrahamCampbell', 'Laravel-GitHub');
//     $response = GitHub::api('search')->issues('created:>2024-01-01 label:"good first issue" label:bug language:PHP');
//     dd($response);

// });
Route::get('/good-first-issue', [GitHubController::class, 'searchIssues'])->name('issues');
