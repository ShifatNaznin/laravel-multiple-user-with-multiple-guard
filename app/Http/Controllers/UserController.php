<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;

class UserController extends Controller
{
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->where('status', 'Active')->first();
        if ($user) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // return "ok";
                return redirect()->intended('home');
            }else {
                return redirect("login")->with('error', 'These credentials do not match our records.');
            }
        } else {
            return redirect("login")->with('error', 'These credentials do not match our records.');
        }
    }
    public function userList()
    {
        $data = User::orderBy('id','DESC')->get();
        return view('admin.user.index')->with([
            'data' => $data,
        ]);
    }

    public function editUser($id)
    {
        $data = User::findOrFail($id);
        return view('admin.user.edit')->with([
            'data' => $data,
        ]);
    }
    public function changeUserStatus(Request $request)
    {
        $id = $request->id;
        $getStatus = DB::table('users')->where('id', $id)->first();

        if ($getStatus->status == 'Active') {
            $change = DB::table('users')->where('id', $id)->update(array(
                'status' => 'Deactive'
            ));

            return true;
        }
        if ($getStatus->status == 'Deactive') {
            $change = DB::table('users')->where('id', $id)->update(array(
                'status' => 'Active'
            ));

            return true;
        }
    }
    public function updateUser(Request $request)
    {
        if (!empty($request->oldPassword && $request->newPassword)) {
            $hashedPassword = Auth::user()->password;

            if (\Hash::check($request->oldPassword, $hashedPassword)) {

                if (!\Hash::check($request->newPassword, $hashedPassword)) {
                    $add = User::find($request->id);
                    $add->name = $request->name;
                    $add->email = $request->email;
                    if ($request->newPassword == null) {
                        $add->password =  $add->password;
                    } else {
                        $add->password =  Hash::make($request->newPassword);
                    }
                    if ($add->save()) {
                        flash('Successfully Updated')->success();
                        return back();
                    } else {
                        flash('Error')->error();
                        return back();
                    }
                } else {
                    flash('new password can not be the old password!')->error();
                    return redirect()->back();
                }
            } else {
                flash('old password doesnt matched ')->error();
                return redirect()->back();
            }
        } else {
            $add = User::find($request->id);
            $add->name = $request->name;
            $add->email = $request->email;
            if ($request->newPassword == null) {
                $add->password =  $add->password;
            } else {
                $add->password =  Hash::make($request->newPassword);
            }
            if ($add) {
                flash('Successfully Updated')->success();
                return back();
            } else {
                flash('Error')->error();
                return back();
            }
        }
    }
    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('auth.password.verify', ['token' => $token], function ($message) use ($request) {
            $message->from($request->email);
            $message->to('codingdriver15@gmail.com');
            $message->subject('Reset Password Notification');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
        flash('Successfully Deleted')->success();
        return back();
    }
    public function userFeatureList()
    {
        $data = UserRole::orderBy('id', 'DESC')->get();
        $feature = Feature::orderBy('id', 'DESC')->get();
        return view('admin.user.user-feature-list')->with([
            'data' => $data,
            'feature' => $feature,
        ]);
    }
    public function addUserFeature($id)
    {
        $data = UserRole::where('id', $id)->first();
        $feature = Feature::orderBy('id', 'DESC')->get();
        return view('admin.user.user-feature')->with([
            'data' => $data,
            'feature' => $feature,
        ]);
    }
    public function storeUserFeature(Request $request)
    {
        // return
        if (isset($request->userFeature)) {
            $userFeature = implode(",", $request->userFeature);
        }else{
            $userFeature =0;
        }
        $data = DB::table('user_roles')
            ->where('id',$request->id)
            ->update(['userFeature' => $userFeature]);
        if ($data) {
            flash('Successfully Added')->success();
            return back();
        } else {
            flash('Error')->error();
            return back();
        }
    }
}
