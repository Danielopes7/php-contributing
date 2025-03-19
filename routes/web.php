<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;
use GrahamCampbell\GitHub\Facades\GitHub;

Route::get('/', [IssueController::class, 'index'])->name('issues');
