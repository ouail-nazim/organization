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
    function news()
    {
        return view("guest.news");
    }
    function goals()
    {
        return view("guest.goals");
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
