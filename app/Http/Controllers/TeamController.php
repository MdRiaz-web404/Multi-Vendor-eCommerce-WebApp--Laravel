<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Team;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('dashboard.team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'name'=>'required',
        //     'bio'=>'required',
        //     'team_memeber_photo'=> 'required|image',
        // ]);
        return $request->team_memeber_photo;
        // $newname= Carbon::now()->format('Y').rand(1000,9999).".".$request->file('team_memeber_photo')->getClientOriginalExtension();
        // $img = Image::make($request->file('team_memeber_photo'))->resize(540, 540);
        // $img->save(base_path('public/dashboard_assets/team_photo/'.$newname), 50);
        // Team::insert([
        //     'name'=>$request->name,
        //     'bio'=>$request->bio,
        //     'photo'=>$newname,
        //     'created_at'=>Carbon::now(),
        // ]);
        // return redirect('team')->with('success', 'Team member added successfully!');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
