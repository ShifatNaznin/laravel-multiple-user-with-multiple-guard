<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Affiliate;
use App\Models\Commission;
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
        } else {
            flash('These credentials do not match our records')->error();
            return back();
        }
    }
    public function transection()
    {
        $data = Commission::orderBy('id', 'DESC')->get();
        return view('backend.admin.transection')->with([
            'data' => $data,
        ]);
    }
    public function affiliateList()
    {
        $data = Affiliate::where('userType','affiliate')->orderBy('id', 'DESC')->get();
        return view('backend.admin.affiliate-list')->with([
            'data' => $data,
        ]);
    }
}
