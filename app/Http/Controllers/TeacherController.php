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
        $teachers = Teacher::findOrFail($id);
        return view('teacher.show', compact('teachers'));

    }
    public function create()
    {
        return view('teacher.create');
    }
    public function save(Request $request)
    {
        // Create a new Teacher
        Teacher::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'address_en' => $request->address_en,
            'address_ar' => $request->address_ar,
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
        $teachers = Teacher::findOrFail($id);
        return view("teacher.edit", compact("teachers"));
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
