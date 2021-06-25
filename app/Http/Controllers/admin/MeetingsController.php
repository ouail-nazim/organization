<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MeetingsController extends Controller
{
    function index()
    {
        return view('admin.meetings.meetingsList')->with([
            'meetings' => Meeting::latest()->paginate(6)
        ]);
    }
    function create()
    {
        return view('admin.meetings.addMeeting');
    }
    function store(Request $request)
    {
        request()->validate([
            'cover' => ['required', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2000'],
            'ar_title' => ['required', 'string', 'max:50'],
            'en_title' => ['required', 'string', 'max:50'],
            'ar_description' => ['required', 'string', 'max:255'],
            'en_description' => ['required', 'string', 'max:255'],
        ]);

        $meeting = Meeting::create([
            'ar_title' => request('ar_title'),
            'en_title' => request('en_title'),
            'ar_description' => request('ar_description'),
            'en_description' => request('en_description'),
        ]);

        if (request('cover')) {
            $meeting->addMedia(request('cover'))->toMediaCollection("meeting_cover");
        }
        return redirect()->route("admin.meetings.list");
    }
    function edit(Meeting $meeting)
    {
        return view("admin.meetings.editMeeting")->with([
            "meeting" => $meeting
        ]);
    }
    function update(Meeting $meeting, Request $request)
    {
        $attr = [];
        request()->validate([
            'cover' => ['image', 'mimes:png,jpg,jpeg,svg', 'max:1000'],
            'ar_title' => ['required', 'string', 'max:150'],
            'en_title' => ['required', 'string', 'max:150'],
            'ar_description' => ['required', 'string', 'max:1000'],
            'en_description' => ['required', 'string', 'max:1000'],
        ]);

        // get changed data
        if (request('ar_title') != $meeting->ar_title) $attr = Arr::add($attr, 'ar_title', request('ar_title'));
        if (request('en_title') != $meeting->en_title) $attr = Arr::add($attr, 'en_title', request('en_title'));
        if (request('ar_description') != $meeting->ar_description) $attr = Arr::add($attr, 'ar_description', request('ar_description'));
        if (request('en_description') != $meeting->en_description) $attr = Arr::add($attr, 'en_description', request('en_description'));
        // update member data

        if (count($attr) > 0) $meeting->update($attr);

        //change cover 
        if ($request->cover_changed === 'true') {
            $meeting->clearMediaCollection("meeting_cover");
            $meeting->addMedia(request('cover'))->toMediaCollection("meeting_cover");
        }

        return redirect()->route("admin.meetings.list");
    }
    function destroy(Meeting $meeting)
    {
        if ($meeting) $meeting->delete();
        return redirect()->back();
    }
}
