<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Goals;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view("guest.welcome");
    }
    function news()
    {
        return view("guest.news");
    }
    function goals()
    {
        $goals = Goals::where('lang', currentLocale())->get();
        return view("guest.goals")->with(["goals" => $goals]);
    }
    function meetings()
    {
        return view("guest.meetings");
    }
    function members()
    {
        return view("guest.members");
    }
    function contactUs()
    {
        return view("guest.contactUs");
    }
}
