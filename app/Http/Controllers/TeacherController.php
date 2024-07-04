<?php

namespace App\Http\Controllers;

use App\Models\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher.index', compact('teacher'));

    }

    public function show($id)
    {
        $Teachers = Teacher::findOrFail($id);
        return view('teacher.show', compact('Teachers'));

    }
    public function create()
    {
        return view('teacher.create');
    }
    public function save(Request $request)
    {
        // Create a new Teacher
        Teacher::create([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
        ]);

        // Redirect with a success message
        return redirect()->route('teacher')->with('message', "Created Successfully");
    }
    public function delete($id)
    {
        Teacher::findOrFail($id)->delete();
        return redirect()->route("teacher")->with("message", "Deleted Successfully");
    }
    public function edit($id)
    {
        $Teachers = Teacher::findOrFail($id);
        return view("teacher.edit", compact("Teachers"));
    }
    public function update(Request $request, $id)
    {
        Teacher::findOrFail($id)->update([
            "id" => $request->id,
            "name" => $request->name,
            "address" => $request->address,
            "mobile" => $request->mobile,
        ]);
        return redirect()->route("teacher")->with("message", "Updated Successfully");
    }
}
