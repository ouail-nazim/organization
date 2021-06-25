<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        return view("admin.members.membersList")->with(["members" => Member::latest()->paginate(9)]);
    }
    function create()
    {
        return view('admin.members.addMember')->with(["grades" => Grade::all()]);
    }
    function store(Request $request)
    {
        request()->validate([
            'avatar' => ['required', 'image', 'mimes:png,jpg,jpeg,svg'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'grade' => ['required', 'exists:grades,id'],
            'phone' => ['required'],
        ]);

        $member = Member::create([
            "name" => request('name'),
            "email" => request('email'),
            "phone" => request('phone'),
            "grade_id" => request('grade'),
        ]);
        if (request('avatar')) {
            $member->addMedia(request('avatar'))->toMediaCollection("memeber_avatar");
        }
        return redirect()->route("admin.members.list");
    }
    function destroy(Member $member)
    {
        if ($member) {
            $member->delete();
        }
        return redirect()->back();
    }
}
