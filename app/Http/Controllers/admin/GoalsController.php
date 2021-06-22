<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    function index()
    {
        return view("admin.goals.goalsList")->with(["goals" => Goals::all()]);
    }
    function create()
    {
        return view("admin.goals.addGoal");
    }
    function store(Request $request)
    {
        $request->validate([
            'ar_desc' => 'required|max:255',
            'en_desc' => 'max:255',
        ]);
        Goals::create(
            [
                "description" => $request->ar_desc,
                "lang" => "ar"
            ]
        );
        if ($request->en_desc) {
            Goals::create(
                [
                    "description" => $request->en_desc,
                    "lang" => "en"
                ]
            );
        }
        return redirect()->route("admin.goals.list");
    }
    function edit(Request $request)
    {

        $request->validate([
            'description' => 'required|max:255',
        ]);

        Goals::find($request->goal_id)->update([
            "description" => $request->description
        ]);
        return redirect()->back();
    }
    function destroy(Goals $goal)
    {
        if ($goal) {
            $goal->delete();
        }
        return redirect()->back();
    }
}
