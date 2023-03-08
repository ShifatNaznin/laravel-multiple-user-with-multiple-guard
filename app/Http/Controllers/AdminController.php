<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('frontend.admin.login');
    }
    public function register()
    {
        return view('frontend.admin.register');
    }
    public function signup(Request $request)
    {
        try {
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'userType' => $request->userType,
                'password' => Hash::make($request->password),
            ]);
            flash('Successfully Registered')->success();
            return redirect()->intended('admin/login');
        } catch (\Throwable $th) {
            flash('Error')->error();
            return back();
        }
    }
    public function adminlogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
