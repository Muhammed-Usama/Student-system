<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function con(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);
        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $data = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $user = Admin::where('email', $data['email'])->firstOrFail();
            return view('admin.dashboard', compact('user'));
        } else {
            return redirect('admin/login')->with('error_massage', 'Invalid Email or Password!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

}
