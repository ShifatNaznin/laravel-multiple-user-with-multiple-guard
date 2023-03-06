<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function userRoleList()
    {
        $data = UserRole::orderBy('id', 'DESC')->get();
        return view('admin.user-role.index')->with([
            'data' => $data,
        ]);
    }

    public function storeUserRole(Request $request)
    {
        $add = new UserRole();
        $add->roleName = $request->roleName;
        $add->save();
        if ($add) {
            flash('Successfully Added')->success();
            return back();
        } else {
            flash('Error')->error();
            return back();
        }
    }
    public function updateUserRole(Request $request)
    {
        $add = UserRole::find($request->id);
        $add->roleName = $request->roleName;
        $add->save();
        if ($add) {
            flash('Successfully Updated')->success();
            return back();
        } else {
            flash('Error')->error();
            return back();
        }
    }
    public function deleteUserRole($id)
    {
        $data = User::where('userRole', $id)->first();
        // return $data;
        if ($data) {
            flash('Can not delete it!! User Role already exist into User List')->error();
            return back();
        } elseif (empty($data)) {
            UserRole::find($id)->delete();
            flash('Successfully Deleted')->success();
            return back();
        }
    }
}
