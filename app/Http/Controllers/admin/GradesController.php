<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{

    public function index()
    {
        return view("admin.grade.gradesList")->with(["grades" => Grade::all()]);
    }
    function create()
    {
        return view("admin.grade.addGrade");
    }

    function store(Request $request)
    {
        $attr = $request->validate([
            'grade' => 'required|string|max:255'
        ]);
        Grade::create($attr);
        return redirect()->route("admin.grades.list");
    }
    function destroy(Grade $grade)
    {
        if ($grade) $grade->delete();
        if ($grade->members) {
            $grade->members->map(function ($member, $key) {
                return $member->delete();
            });
        }
        return redirect()->back();
    }
}
