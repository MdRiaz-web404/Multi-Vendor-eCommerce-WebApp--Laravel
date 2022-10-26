<?php

namespace App\Http\Controllers;

use App\Mail\VendorActivation;
use App\Mail\VendorBan;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class VendorController extends Controller
{
    function vendor(){
        return view('vendor.vendor_register');
    }
    function vendorlogin (){
        return view('vendor.vendor_login');
    }
    function vendor_list(){
        return view('vendor.vendor_list',[
            'users'=>User::latest()->get(),
        ]);
    }
    function vendor_status($id){

      $user=User::find($id);
      if ($user->status=='active') {
        $user->status='deactive';
        Mail::to($user->email)->send(new VendorBan($user->name,$user->email,$user->shop_name));
      }else{
        $user->status='active';
        Mail::to($user->email)->send(new VendorActivation($user->name,$user->email,$user->shop_name));
      }
      $user->save();
      return back();

    }

    function vendor_register(Request $request){
        $request->validate([
            '*'=>'required',
            'email' => 'unique:App\Models\User,email',
            'password' => 'confirmed',
        ]);
        User::insert([
            'shop_name'=>$request->shop_name,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'vendor',
            'status'=>'deactive',
            'created_at'=>Carbon::now(),
            'email_verified_at'=>Carbon::now(),
        ]);
        return back()->with('success','Your account created successfully. Now, Wait for the approbation email. Thanks!');
    }
    function vendor_login(Request $request){
        $request->validate([
            '*'=>'required',
        ]);
        if (User::where('email','=',$request->email)->exists()) {
            if (User::where('email','=',$request->email)->first()->role=='vendor') {
                if (User::where('email','=',$request->email)->first()->status=='active') {
                    if (Auth::attempt(['email' =>$request->email, 'password' => $request->password])) {
                        return redirect('home');
                    }else{
                        return back()->withErrors('Your provided email and password is wrong!');
                    }
                }else{
                    return back()->withErrors('Your account is not approved yet!');
                }
            }
            else{
                return back()->withErrors('You are not a Vendor!');
            }
        }else{
            return back()->withErrors('Your provided email and password is wrong!');
        }
        

    }




}
