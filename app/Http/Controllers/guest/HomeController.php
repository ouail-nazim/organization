<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view("guest.welcome");
    }
}
