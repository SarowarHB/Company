<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class ChangePassword extends Controller
{
    public function ChangePassword(){
        return view('layouts.body.changePass');
    }


    public function UpdatePassword(Request $request){
        $validateddata = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $haspass = Auth::user()->password;

        if(Hash::check($request->oldPassword, $haspass)){

            $user= User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success','Update successfully');
        }

        else{
            return redirect()->back()->with('error','Not Chnage');
        }
    }
}
