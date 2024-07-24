<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GrahamCampbell\GitHub\Facades\GitHub;
class GitController extends Controller
{


    public static function index()
    {
        GitHub::repo()->show('danielopes7', 'SuperGestao', [], ['timeout' => 30]); // Timeout em segundos
        // this example is simple, and there are far more methods available
    }
}