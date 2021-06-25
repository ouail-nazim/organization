<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Member;
use Attribute;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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


    function edit(Member $member)
    {
        return view("admin.members.editMember")->with([
            "member" => $member,
            "grades" => Grade::all()
        ]);
    }
    function update(Member $member, Request $request)
    {
        $attr = [];
        request()->validate([
            'avatar' => ['image', 'mimes:png,jpg,jpeg,svg', 'max:2000'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('members')->ignore($member->id)],
            'grade' => ['required', 'exists:grades,id'],
            'phone' => ['required'],
        ]);

        // get changed data
        if (request('name') != $member->name) $attr = Arr::add($attr, 'name', request('name'));
        if (request('email') != $member->email) $attr = Arr::add($attr, 'email', request('email'));
        if (request('grade') != $member->grade_id) $attr = Arr::add($attr, 'grade_id', request('grade'));
        if (request('phone') != $member->phone) $attr = Arr::add($attr, 'phone', request('phone'));
        // update member data
        if (count($attr) > 0) $member->update($attr);

        //change avatar 
        if ($request->avatar_changed === 'true') {
            $member->clearMediaCollection("memeber_avatar");
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
