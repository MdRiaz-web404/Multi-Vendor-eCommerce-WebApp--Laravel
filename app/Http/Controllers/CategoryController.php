<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
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
        return view('dashboard.category.index',[
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
        'category_name'=>'required',
        'category_photo'=>'required|image',
    ]);
    if ($request->category_slug) {
        $slug=Str::slug($request->category_slug);
    }else{
        $slug= Str::slug($request->category_name);
    }
    $name= Carbon::now()->format('Y').rand(1000,9999).".".$request->file('category_photo')->getClientOriginalExtension();
    $img = Image::make($request->file('category_photo'))->resize(200, 256);
    $img->save(base_path('public/dashboard_assets/category_photos/'.$name), 50);
    Category::insert([
        'category_name'=>$request->category_name,
        'category_slug'=>$slug,
        'category_photo'=>$name,
        'created_at'=>Carbon::now(),

    ]);
    return redirect('category')->with('success_category', 'Category added successfully!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.category.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
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
        Category::find($id)->update([
            'category_name'=>$request->category_name,
            'category_slug'=>$request->category_slug,
            'status'=>$request->status,
        ]);
        if ($request->hasFile('category_photo')) {
          unlink(base_path('public/dashboard_assets/category_photos/'.Category::find($id)->category_photo));
            $name= Carbon::now()->format('Y').rand(1000,9999).".".$request->file('category_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('category_photo'))->resize(200, 256);
            $img->save(base_path('public/dashboard_assets/category_photos/'.$name), 50);
            Category::find($id)->update([
                'category_photo'=>$name,
            ]);
        }
        return redirect('category')->with('success_category', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Category::find($id)->delete();
        return back();
    }
}
