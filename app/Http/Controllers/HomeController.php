<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role=='customer') {
            return view('frontend.customer_account');
        }else{
            return view('home');

        }
    }
    public function profile()
    {
        return view('dashboard.profile');
    }
    public function photoupload(Request $request)
    {
        $request->validate([
            'avatar'=>'required|image',
        ]);
        $new_name= Carbon::now()->format('Y').rand(1000,9999).".".$request->file('avatar')->getClientOriginalExtension();
        $img = Image::make($request->file('avatar'))->resize(400, 400);
        $img->save(base_path('public/dashboard_assets/profile_photos/'.$new_name), 80);

        User::find(auth()->id())->update([
            'avatar'=> $new_name,
        ]);
        return back();
    }
    public function admindetails(Request $request)
    {
        if($request->current_password && $request->password){
            $request->validate([
                'current_password'=>'required',
                'password'=>'required|confirmed|different:current_password|',
                'password_confirmation'=>'required',
            ]);
            if (Hash::check($request->current_password, auth()->user()->password)){
                User::find(auth()->id())->update([
                    'password'=>bcrypt($request->password),
                    'name'=>$request->name,
                    'email'=>$request->email,
                ]);
                return back()->with('success','Successfully Changed');
            }
            else{
                return back()->withErrors('Your provided current password does not matched!');
            };
        }else{
            User::find(auth()->id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            return back()->with('success','Successfully Changed');
        }
    }

    // function team(){
    //     $teams=Team::latest()->get();
    //        return view('team', compact('teams'));
    //    }
    //    function teaminsert(Request $request){
    //        Team::insert([
    //            "name" =>$request->name,
    //            "phone_number" =>$request->phone_number,
    //            "created_at" => Carbon::now(),
    //        ]);
    //        return back() -> with('success_mesage', 'Team member added successfully');
    //    }
}

