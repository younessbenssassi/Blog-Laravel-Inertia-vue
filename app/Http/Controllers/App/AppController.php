<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function __invoke()
    {
        return config('app.version');
    }
}
