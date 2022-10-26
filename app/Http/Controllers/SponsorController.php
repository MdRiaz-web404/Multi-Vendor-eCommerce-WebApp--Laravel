<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SponsorController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sponsor.index',[
            'sponsors'=>Sponsor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sponsor.create');
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
            '*'=>'required',
            'company_photo'=>'mimes:png',
        ]);
        $name= Carbon::now()->format('Y').rand(1000,9999).".".$request->file('company_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('company_photo'))->resize(344, 60);
        $img->save(base_path('public/dashboard_assets/company_photos/'.$name), 50);
        Sponsor::insert([
            'company_name'=>$request->company_name,
            'company_photo'=>$name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect('sponsor')->with('success_sponsor', 'Sponsor added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        return view('dashboard.sponsor.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Sponsor::find($id)->update([
            'company_name'=>$request->company_name,
            'status'=>$request->status,
        ]);
        if ($request->hasFile('company_photo')) {
            $request->validate([
                'company_photo'=>'mimes:png',
            ]);
            unlink(base_path('public/dashboard_assets/company_photos/'.Sponsor::find($id)->company_photo));
            $name= Carbon::now()->format('Y').rand(1000,9999).".".$request->file('company_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('company_photo'))->resize(344, 60);
            $img->save(base_path('public/dashboard_assets/company_photos/'.$name), 50);
            Sponsor::find($id)->update([
                'company_photo'=>$name,
            ]);
        }
        return redirect('sponsor')->with('success_sponsor', 'Sponsor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sponsor::find($id)->delete();
        return back();
    }
}
