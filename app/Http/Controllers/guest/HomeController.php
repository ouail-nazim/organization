<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Goals;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    function index()
    {
        return view("guest.welcome");
    }
    function news()
    {

        return view("guest.news")->with([
            'news' => News::latest()->paginate(6)
        ]);;
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
