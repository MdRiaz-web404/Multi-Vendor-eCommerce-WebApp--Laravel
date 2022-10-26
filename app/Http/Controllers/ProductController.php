<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
        return view('dashboard.product.index',[
            "products"=>Product::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.product.create',[
            'categories'=>Category::get(['id','category_name']),
        ]);
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
            'product_name'=>'required',
            'regular_price'=>'required',
            'category'=>'required',
            'featured_photo'=>'required|image',
        ]);

        $featured_photo=Carbon::now()->format('Y').rand(1,999999999).".".$request->file('featured_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('featured_photo'))->resize(800, 601);
        $img->save(base_path('public/dashboard_assets/product_photos/'.$featured_photo), 50);
        $product=Product::create([
            'product_name'=>$request->product_name,
            'purchased_price'=>$request->purchased_price,
            'regular_price'=>$request->regular_price,
            'discount'=>$request->discount,
            'category_id'=>$request->category,
            'vendor_id'=>auth()->id(),
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'featured_photo'=>$featured_photo,
         ]);
         if ($request->hasFile('product_gallery1')) {
            $product_gallery1=Carbon::now()->format('Y').rand(1,999999999).".".$request->file('product_gallery1')->getClientOriginalExtension();
            $img = Image::make($request->file('product_gallery1'))->resize(800, 601);
            $img->save(base_path('public/dashboard_assets/product_photos/'.$product_gallery1), 50);
            Product::find($product->id)->update([
                'product_gallery1'=>$product_gallery1,
            ]);
        }
         if ($request->hasFile('product_gallery2')) {
            $product_gallery2=Carbon::now()->format('Y').rand(1,999999999).".".$request->file('product_gallery2')->getClientOriginalExtension();
            $img = Image::make($request->file('product_gallery2'))->resize(800, 601);
            $img->save(base_path('public/dashboard_assets/product_photos/'.$product_gallery2), 50);
            Product::find($product->id)->update([
                'product_gallery2'=>$product_gallery2,
            ]);
        }
         if ($request->hasFile('product_gallery3')) {
            $product_gallery3=Carbon::now()->format('Y').rand(1,999999999).".".$request->file('product_gallery3')->getClientOriginalExtension();
            $img = Image::make($request->file('product_gallery3'))->resize(800, 601);
            $img->save(base_path('public/dashboard_assets/product_photos/'.$product_gallery3), 50);
            Product::find($product->id)->update([
                'product_gallery3'=>$product_gallery3,
            ]);
         }
         return back()->with('success',"Product added successfully!");

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
    public function edit(Product $product)
    {
        return view('dashboard.product.edit',compact('product'));
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
        Product::find($id)->update([
            'regular_price'=>$request->regular_price,
            'discount'=>$request->discount,
            'status'=>$request->status,
        ]);

        if ($request->hasFile('featured_photo')) {
            $featured_photo=Carbon::now()->format('Y').rand(1,999999999).".".$request->file('featured_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('featured_photo'))->resize(800, 601);
            $img->save(base_path('public/dashboard_assets/product_photos/'.$featured_photo), 50);
            Product::find($id)->update([
                'featured_photo'=>$featured_photo,
            ]);
        }
        if ($request->hasFile('product_gallery1')) {

            $product_gallery1=Carbon::now()->format('Y').rand(1,999999999).".".$request->file('product_gallery1')->getClientOriginalExtension();
            $img = Image::make($request->file('product_gallery1'))->resize(800, 601);
            $img->save(base_path('public/dashboard_assets/product_photos/'.$product_gallery1), 50);
            Product::find($id)->update([
                'product_gallery1'=>$product_gallery1,
            ]);
        }
        if ($request->hasFile('product_gallery2')) {

            $product_gallery2=Carbon::now()->format('Y').rand(1,999999999).".".$request->file('product_gallery2')->getClientOriginalExtension();
            $img = Image::make($request->file('product_gallery2'))->resize(800, 601);
            $img->save(base_path('public/dashboard_assets/product_photos/'.$product_gallery2), 50);
            Product::find($id)->update([
                'product_gallery2'=>$product_gallery2,
            ]);
        }
         if ($request->hasFile('product_gallery3')) {

            $product_gallery3=Carbon::now()->format('Y').rand(1,999999999).".".$request->file('product_gallery3')->getClientOriginalExtension();
            $img = Image::make($request->file('product_gallery3'))->resize(800, 601);
            $img->save(base_path('public/dashboard_assets/product_photos/'.$product_gallery3), 50);
            Product::find($id)->update([
                'product_gallery3'=>$product_gallery3,
            ]);
         }
         return back()->with('success',"Status Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->with('success',"Product deleted successfully!");
    }
    public function inventory(Product $product)
    {
        $inventories=Inventory::where('vendor_id','=',auth()->id())->where('product_id',$product->id)->get();
        $sizes=Size::where('vendor_id','=',auth()->id())->get();
        $colors=Color::where('vendor_id','=',auth()->id())->get();
        return view('dashboard.product.inventory',compact('product','sizes','inventories','colors'));
    }
    public function inventory_post(Product $product, Request $request){

        if($request->size || $request->color){
            $request->validate([
                'color'=>'required',
                'size'=>'required',
            ]);
        }
        $request->validate([
            'quantity'=>'required',
        ]);
        $inventory=Inventory::where([
            'vendor_id'=>auth()->id(),
            'product_id'=>$product->id,
            'size_id'=>$request->size,
            'color_id'=>$request->color,
        ])->first();
        if ($inventory) {
            $inventory->increment('quantity',$request->quantity);
            $inventory->save();
        }else{
            Inventory::insert([
                    'vendor_id'=>auth()->id(),
                    'product_id'=>$product->id,
                    'size_id'=>$request->size,
                    'color_id'=>$request->color,
                    'quantity'=>$request->quantity,
                    'created_at'=>Carbon::now(),
            ]);
        }
        return back()->with('success','Inventory added successfully!');

    }
    public function inventory_delete($id)
    {
        Inventory::find($id)->delete();
        return back()->with('success',"Inventory deleted successfully!");
    }
}
