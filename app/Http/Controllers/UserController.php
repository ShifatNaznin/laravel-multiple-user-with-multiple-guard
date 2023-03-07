<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Commission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('frontend.user.login');
    }
    public function register()
    {
        return view('frontend.user.register');
    }
    public function signup(Request $request)
    {
        try {
            $randomNumber = mt_rand(100, 9999);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'userType' => $request->userType,
                'dob' => $request->dob,
                'registrationCode' => $request->registrationCode,
                'password' => Hash::make($request->password),
            ]);
            flash('Successfully Added')->success();
            return back();
        } catch (\Throwable $th) {
            flash('Error')->error();
            return back();
        }
    }
    public function userlogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function information($id)
    {
        $data = User::findOrFail($id);
        return view('backend.user.info')->with([
            'data' => $data
        ]);
    }
    public function addMoney($id)
    {
        $data = User::findOrFail($id);
        return view('backend.user.add-money')->with([
            'data' => $data
        ]);
    }
    public function storeMoney(Request $request)
    {
        $commissionAmount = 0;
        $afterCommisionAmount = 0;
        $user = User::where('id', $request->id)->first();
        if (isset($user->registrationCode)) {
            $getAffiliate = Affiliate::where('promoCode', $user->registrationCode)->first();
            if ($getAffiliate->userType == 'affiliate') {
                $percent = (30 / 100);
                $totalAmount = ($request->amount * $percent);
                $afterCommisionAmount = ($request->amount -  $totalAmount);
                $commissionAmount = $totalAmount;
                if (isset($totalAmount)) {
                    Commission::create([
                        'userId' => $request->id,
                        'userAmmount' => $request->amount,
                        'affiliateId' =>  $getAffiliate->id,
                        'affiliateType' => $getAffiliate->userType,
                        'commissionPercent' => '30%',
                        'commissionAmount' => $totalAmount,
                    ]);
                }
            } elseif ($getAffiliate->userType == 'subaffiliate') {
                $getParentAffiliateType = Affiliate::where('id', $getAffiliate->parentId)->first();
                $subAffPercent = (20 / 100);
                $totalSubAffAmount = ($request->amount * $subAffPercent);
                if (isset($totalSubAffAmount)) {
                    Commission::create([
                        'userId' => $request->id,
                        'userAmmount' => $request->amount,
                        'affiliateId' =>  $getAffiliate->parentId,
                        'affiliateType' => $getParentAffiliateType->userType,
                        'commissionPercent' => '20%',
                        'commissionAmount' => $totalSubAffAmount,
                    ]);
                }
                $AffPercent = (10 / 100);
                $totalAffAmount = ($request->amount * $AffPercent);
                if (isset($totalAffAmount)) {
                    Commission::create([
                        'userId' => $request->id,
                        'userAmmount' => $request->amount,
                        'affiliateId' =>  $getAffiliate->id,
                        'affiliateType' => $getAffiliate->userType,
                        'commissionPercent' => '10%',
                        'commissionAmount' => $totalAffAmount,
                    ]);
                }
                $commissionAmount = ($totalSubAffAmount + $totalAffAmount);
                $afterCommisionAmount = ($request->amount - $commissionAmount);
            }
        }
        try {
            User::where('id', $request->id)->update([
                'amount' => $request->amount,
                'commissionAmount' => $commissionAmount,
                'amountAfterCommission' => $afterCommisionAmount,
                'details' => $request->details,
            ]);
            flash('Successfully Added')->success();
            return back();
        } catch (\Throwable $th) {
            flash('Error')->error();
            return back();
        }
    }
}
