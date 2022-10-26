<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function customer_register(Request $request){
        $request->validate([
            '*'=>'required',
            'password' => ['confirmed', Password::min(8)],
        ]);
        $id=User::insertGetId([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone_number'=>$request->phone_number,
            'role'=>'customer',
            'created_at' => Carbon::now(),
        ]);
        User::find($id)->sendEmailVerificationNotification();
        return back()->with('success','Resgistation Successfully! A verification email send to your email');

    }
    function customer_login(Request $request){
        $request->validate([
            '*'=>'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('home');
        }else{
            return back()->withErrors('Your provided email and password is wrong!');

        }

    }

}
