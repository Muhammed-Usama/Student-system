<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Student;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{

    public function show()
    {
        $students = Student::all();
        $data = [
            'msg' => 'Show all data',
            'Status' => 200,
            'data' => $students
        ];

        return response()->json($data);
    }
    public function showid(Request $request)
    {
        $id = $request->id;
        $student = Student::find($id);
        if ($student) {
            $data = [
                'msg' => 'Show all data',
                'Status' => 200,
                'data' => $student
            ];

            return response()->json($data);
        } else {
            $data = [
                'msg' => 'Show all data',
                'Status' => 203,
                'data' => null
            ];

            return response()->json($data);
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            $data = [
                "msg" => "Deleted Seccussfully",
                "status" => 200,
                "Data" => null,
            ];
            return response()->json($data);
        } else {
            $data = [
                "msg" => "NOthing Deleted",
                "status" => 203,
                "Data" => null
            ];
            return response()->json($data);
        }
    }

    public function add(Request $request)
    {
        // validator($request->all(), []);
        $validatedData = Validator::make($request->all(), [
            'id' => 'required|unique:students',
            'name_en' => 'required',
            'name_ar' => 'required',
            'address_en' => 'required',
            'address_ar' => 'required',
            'mobile' => 'required',
        ]);
        if ($validatedData->fails()) {
            //Insert Into database
            $data = [
                'msg' => 'Validation failed',
                'errors' => $validatedData->errors(),
                'status' => 422,

            ];
            return response()->json($data);

        }


        $new = Student::create([
            'id' => $request['id'],
            'name_en' => $request['name_en'],
            'name_ar' => $request['name_ar'],
            'address_en' => $request['address_en'],
            'address_ar' => $request['address_ar'],
            'mobile' => $request['mobile'],
        ]);
        $data = [
            "msg" => "Created Seccussfully",
            "status" => 200,
            "Data" => $new,
        ];
        return response()->json($data);

    }

    public function update(Request $request)
    {
        $old_id = $request->input("old_id");
        $student = Student::findOrFail($old_id);
        $validatedData = Validator::make($request->all(), [
            'id' => [
                'required',
                Rule::unique('students')->ignore($old_id),
            ]
        ]);
        if ($validatedData->fails()) {
            //Insert Into database
            $data = [
                'msg' => 'Validation failed',
                'errors' => $validatedData->errors(),
                'status' => 422,

            ];
            return response()->json($data);

        }

        $student->update([
            'id' => $request->input('id'),
            'name_en' => $request->input('name_en'),
            'name_ar' => $request->input('name_ar'),
            'address_en' => $request->input('address_en'),
            'address_ar' => $request->input('address_ar'),
            'mobile' => $request->input('mobile'),
        ]);

        $data = [
            "msg" => "Created Seccussfully",
            "status" => 200,
            "Data" => $student,
        ];
        return response()->json($data);

    }


}
