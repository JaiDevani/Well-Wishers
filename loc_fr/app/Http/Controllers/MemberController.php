<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;
use App\Temp_User;
use Redirect;
class MemberController extends Controller
{
    //
    public function member()
    {
        return view('layouts.member');
    }
    public function uploadData(Request $request)
    {
        $member = new Member;
        $user=new User;
        $temp=Temp_User::where('name',$request->input('membername'))->first();
        $user->name = $temp->name;
        $user->email = $temp->email;
        $user->password = $temp->password;
        $user->gender=$temp->gender;
        $user->mobile_no = $temp->mobile_no;
        $user->type = 'Member';
        $user->save();
        $temp->delete();
        $member->user_id = $user->id;
        $member->designation = $request->designation;
        $member->birth_date = $request->birth_date;
        $member->join_date = $request->join_date;
        $member->branch = $request->input('branch');
        $member->salary = $request->salary;
        $member->save();
        return redirect('/');
    }
}
