<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;
use GrahamCampbell\GitHub\Facades\GitHub;

Route::get('/', [GitHubController::class, 'searchIssues'])->name('issues');
