<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Category;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\ContactMessage;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    function home(){
        return view('frontend.index',[
            'categories'=>Category::where('status','=','active')->get(),
            'carts'=>Cart::where('user_id',auth()->id())->get(),
            'services'=>Service::where('status','=','active')->limit(4)->get(),
            'sponsors'=>Sponsor::where('status','=','active')->limit(4)->get(),
            'products'=>Product::where('status','=','active')->limit(6)->get(),
            'latestproducts'=>Product::latest()->where('status','=','active')->limit(10)->get(),
        ]);
    }
    function about(){
        return view('frontend.about',[

        ]);
    }
    function product_details($id){
        $product_details=Product::findOrFail($id);
        $related_products=Product::where('category_id','=',$product_details->category_id)->where('id','!=',$id)->limit(4)->get();
        return view('frontend.productdetails', compact('product_details','related_products'));
    }
    function vendor_all_products($vendor_id){
        $categories=Category::where('status','=','active')->get();
        $shopName=User::find($vendor_id);
        $all_products=Product::where('vendor_id','=',$vendor_id)->get();
        return view('frontend.vendor_all_products', compact('all_products','shopName','categories'));
    }
    function category_all_products($id){
        $categories=Category::where('status','=','active')->get();
        $all_products=Product::where('category_id','=',$id)->get();
        return view('frontend.category_all_products',compact('categories','all_products'));
    }
    function shop(){
        $categories=Category::where('status','=','active')->get();
        $all_products=Product::all();
        return view('frontend.shop',compact('categories','all_products'));
    }
    function cart(){
        return view('frontend.cart');
    }
    function cart_delete ($id){
        Cart::find($id)->delete();
        return back()->with('success','Product removed from Cart!');
    }
    function contact(){
        return view('frontend.contact');
    }
    function account(){
        return view('frontend.customer',[
            'categories'=>Category::where('status','=','active')->get(),
        ]);
    }
    function customer_account(){
        return view('frontend.customer_account');
    }
    function contact_post(Request $request){
        Mail::to($request->email)->send(new ContactMessage($request->except('_token')));
        return back()->with('success','Email Sent Successfully!');

    }


}
