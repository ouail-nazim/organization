<?php

namespace App\Http\Controllers;

use App\Models\App_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.home');
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
            'logo_cover' => ['required', 'image', 'mimes:png,jpg,jpeg,svg']
        ]);
        if (request('logo_cover')) {
            App_setting::where('key', 'logo_cover')->first()->update([
                "value" => "/storage/" . request('logo_cover')->store('logo_covers')
            ]);
        }
        return redirect()->back();




        // $data = $request->validate(['value' => 'required']);
        // App_setting::findOrFail($id)->update($data);
        // return redirect()->back();
    }
}
