<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AffiliateController extends Controller
{
    public function login()
    {
        return view('frontend.affiliate.login');
    }
    public function register()
    {
        return view('backend.affiliate.register');
    }
    public function subAffiliateRegister()
    {
        return view('backend.affiliate.sub-affiliate-register');
    }
    public function signup(Request $request)
    {
        $affUser = Auth::guard('affiliate')->user();
        try {
            $randomNumber = mt_rand(100, 9999);
            Affiliate::create([
                'name' => $request->name,
                'email' => $request->email,
                'parentId' => $affUser->id,
                'userType' => $request->userType,
                'promoCode' => $request->userType.'-'. $randomNumber,
                'password' => Hash::make($request->password),
            ]);
            flash('Successfully Added')->success();
            return back();
        } catch (\Throwable $th) {
            flash('Something is Wrong')->error();
            return back();
        }
    }
    public function affiliatelogin(Request $request)
    {
        // return "back";
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('affiliate')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
