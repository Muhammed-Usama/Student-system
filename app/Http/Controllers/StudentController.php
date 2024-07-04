<?php

namespace App\Http\Controllers;

use App\Models\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));

    }

    public function show($id)
    {
        $students = Student::findOrFail($id);
        return view('student.show', compact('students'));

    }
    public function create()
    {
        return view('student.create');
    }
    public function save(Request $request)
    {
        // Create a new student
        Student::create([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
        ]);

        // Redirect with a success message
        return redirect()->route('student')->with('message', "Created Successfully");
    }
    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route("student")->with("message", "Deleted Successfully");
    }
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        return view("student.edit", compact("students"));
    }
    public function update(Request $request, $id)
    {
        Student::findOrFail($id)->update([
            "id" => $request->id,
            "name" => $request->name,
            "address" => $request->address,
            "mobile" => $request->mobile,
        ]);
        return redirect()->route("student")->with("message", "Updated Successfully");
    }

}
