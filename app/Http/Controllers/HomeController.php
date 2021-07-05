<?php

namespace App\Http\Controllers;

use App\Models\App_setting;
use App\Models\Goals;
use App\Models\Grade;
use App\Models\Meeting;
use App\Models\Member;
use App\Models\Message;
use App\Models\News;
use App\Models\Slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home')->with(
            [
                "goals" => Goals::count(),
                "members" => Member::count(),
                "grades" => Grade::count(),
                "news" => News::count(),
                "meetings" => Meeting::count(),
                "emails" => Message::where('type', 'receive')->count(),
            ]
        );
    }
    public function setting()
    {
        return view('admin.setting')->with(["settings" => App_setting::all()]);
    }
    public function editSetting($id, Request $request)
    {
        $data = $request->validate(['value' => 'required']);
        App_setting::findOrFail($id)->update($data);
        return redirect()->back();
    }
    public function logoCover(Request $request)
    {
        request()->validate([
            'logo_cover' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:5000']
        ]);
        if (request('logo_cover')) {
            App_setting::where('key', 'logo_cover')->first()->update([
                "value" => "/storage/" . request('logo_cover')->store('logo_covers')
            ]);
        }
        return redirect()->back();
    }
    public function boss_avatar(Request $request)
    {
        request()->validate([
            'boss_avatar' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:5000']
        ]);
        if (request('boss_avatar')) {
            App_setting::where('key', 'boss_avatar')->first()->update([
                "value" => "/storage/" . request('boss_avatar')->store('boss_avatar')
            ]);
        }
        return redirect()->back();
    }
    function slides()
    {
        return view('admin.slides')->with(["slides" => Slides::all()]);
    }

    function storeSlides(Request $request)
    {
        request()->validate([
            'slide' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:5000']
        ]);
        if (request('slide')) {;
            Slides::create([
                'cover' =>  "/storage/" . request('slide')->store('slide')
            ]);
        }
        return redirect()->back();
    }
    function deleteSlides($id)
    {
        Slides::find($id)->delete();
        return redirect()->back();
    }
    function update()
    {
        return view('admin.updatePassword');
    }
    function updatePassword(Request $request)
    {

        $request->validate([
            'oldpassword' => ['required', 'min:8', 'max:20'],
            'password' => ['required', 'min:8', 'max:20', 'confirmed'],
        ]);


        $user = auth()->user();
        if (!Auth::guard('web')->attempt(
            [
                'email' => $user->email,
                'password' => $request->oldpassword
            ]
        )) {
            return redirect()->back();
        } else {
            $user->forceFill([
                'password' => bcrypt($request->password)
            ])->update();
            return redirect()->route('admin.home')->with('status', 'password updated');
        }
    }
}
