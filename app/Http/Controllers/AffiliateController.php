<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Commission;
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
        if (isset($affUser)) {
            $pId=$affUser->id;
        }else{
            $pId=0;
        }
        try {
            $randomNumber = mt_rand(100, 9999);
            Affiliate::create([
                'name' => $request->name,
                'email' => $request->email,
                'parentId' => $pId,
                'userType' => $request->userType,
                'promoCode' => $request->userType.'-'. $randomNumber,
                'password' => Hash::make($request->password),
            ]);
            flash('Successfully Registered')->success();
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
        }else{
            flash('These credentials do not match our records')->error();
            return back();
        }
    }
    public function information($id)
    {
        $data = Affiliate::findOrFail($id);
        $total=Commission::where('affiliateId',$id)->sum('commissionAmount');
        return view('backend.affiliate.info')->with([
            'data' => $data,
            'total' => $total,
        ]);
    }
    public function commission(){
        $user= Auth::guard('affiliate')->user();
        if ($user->userType == 'affiliate') {
            $data=Commission::where('affiliateId',$user->id)->orderBy('id','DESC')->get();
            $subAffData=Commission::orderBy('id','DESC')->get();
            return view('backend.affiliate.affiliate-commission')->with([
                'user'=>$user,
                'data' => $data,
                'subAffData' => $subAffData,
            ]);
        }
        if ($user->userType == 'subaffiliate') {
            $data=Commission::where('affiliateId',$user->id)->orderBy('id','DESC')->get();
            return view('backend.affiliate.sub-affiliate-commission')->with([
                'user'=>$user,
                'data' => $data
            ]);
        }
    }
    public function subAffiliateList(){
        $user= Auth::guard('affiliate')->user()->id;
        $data = Affiliate::where('parentId',$user)->where('userType','subaffiliate')->orderBy('id', 'DESC')->get();
        return view('backend.affiliate.sub-affiliate-list')->with([
            'data' => $data,
        ]);
    }
}
