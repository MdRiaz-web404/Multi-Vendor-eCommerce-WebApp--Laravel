<?php

namespace App\Http\Controllers;

use App\Models\AddAdmin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddAdminNotification;
use App\Models\User;

class AddAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('dashboard.addadmin.index',[
            'users'=>User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=> 'required',
            'email' => 'unique:App\Models\User,email|required'
        ]);
       $password = Str::upper(Str::random(8));
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($password),
            'role'=>'admin',
            'email_verified_at'=>Carbon::now(),
            'created_at'=>Carbon::now(),
        ]);
        Mail::to($request->email)->send(new AddAdminNotification($request->name,$request->email,$password));
        return back()->with('success','Admin added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $addAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $addAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $addAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $addAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
