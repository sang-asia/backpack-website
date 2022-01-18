<?php

namespace Web\FE\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('web_fe::home.index');
    }
}
