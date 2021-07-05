<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Goals;
use App\Models\Meeting;
use App\Models\Member;
use App\Models\Message;
use App\Models\News;
use App\Models\Slides;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{
    function index()
    {
        return view("guest.welcome")->with(["slides" => Slides::all()]);
    }
    // news functions
    function news()
    {
        return view("guest.news.news")->with([
            'news' => News::latest()->paginate(6)
        ]);
    }
    function showNews(News $news)
    {
        return view("guest.news.show")->with([
            'news' => $news
        ]);
    }
    // goals functions
    function goals()
    {
        $goals = Goals::where('lang', currentLocale())->get();
        return view("guest.goals")->with(["goals" => $goals]);
    }
    // meetings function
    function meetings()
    {
        return view("guest.meeting.meetings")->with([
            'meetings' => Meeting::latest()->paginate(8)
        ]);
    }
    function showMeeting(Meeting $meeting)
    {
        return view("guest.meeting.show")->with([
            'meeting' => $meeting
        ]);
    }
    //members functions
    function members()
    {
        return view("guest.members")->with([
            'members' => Member::latest()->paginate(9)
        ]);
    }
    // contact us functions
    function contactUs()
    {
        return view("guest.contactUs");
    }
    function sendMail(Request $request)
    {
        $data = request()->validate([
            'firstName' => ['required', 'string', 'max:50'],
            'lastName' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:10'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:10000'],
        ]);

        Message::create($data);
        return redirect()->route('contact_us')->with('status', Lang::get("msg_sent"));
    }
}
