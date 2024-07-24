<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitController;
use GrahamCampbell\GitHub\Facades\GitHub;

Route::get('/good-first-issue', function () {
    $response = GitHub::repo()->show('GrahamCampbell', 'Laravel-GitHub');
    dd($response);

});
