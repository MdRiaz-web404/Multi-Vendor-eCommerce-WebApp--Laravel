<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
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
        return view('dashboard.service.index',[
            'services'=>Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.create');
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
            'service_name'=>'required',
            'service_description'=>'required',
            'service_photo'=>'required|mimes:png',
        ]);

        $name= Carbon::now()->format('Y').rand(1000,9999).".".$request->file('service_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('service_photo'))->resize(200, 256);
        $img->save(base_path('public/dashboard_assets/service_photos/'.$name), 50);
        Service::insert([
            'service_name'=>$request->service_name,
            'service_description'=>$request->service_description,
            'service_photo'=>$name,
            'created_at'=>Carbon::now(),

        ]);
        return redirect('service')->with('success_service', 'Service added successfully!');
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
    public function edit(Service $service)
    {
        return view('dashboard.service.edit',compact('service'));
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
        Service::find($id)->update([
            'service_name'=> $request->service_name,
            'service_description'=> $request->service_description,
            'status'=> $request->status,
        ]);
        if ($request->hasFile('service_photo')) {
            $request->validate([
                'service_photo'=>'mimes:png',
            ]);
            unlink(base_path('public/dashboard_assets/category_photos/'.Service::find($id)->category_photo));
            $name= Carbon::now()->format('Y').rand(1000,9999).".".$request->file('category_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('category_photo'))->resize(200, 256);
            $img->save(base_path('public/dashboard_assets/category_photos/'.$name), 50);
            Service::find($id)->update([
                'service_photo'=>$name,
            ]);
        }
        return redirect('service')->with('success_service', 'Service updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        return back();
    }
}
