<?php

namespace App\Http\Controllers;

use Stripe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function index(){
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        return view('checkout.index',compact('countries','user_login'));
    }
    public function submitcheckout(Request $request){
       $this->validate($request,[
           'billing_name'=>'required',
           'billing_address'=>'required',
           'billing_city'=>'required',
           'billing_state'=>'required',
           'billing_pincode'=>'required',
           'billing_mobile'=>'required',
           'shipping_name'=>'required',
           'shipping_address'=>'required',
           'shipping_city'=>'required',
           'shipping_state'=>'required',
           'shipping_pincode'=>'required',
           'shipping_mobile'=>'required',
       ]);
        $input_data=$request->all();
       $count_shippingaddress=DB::table('delivery_address')->where('users_id',Auth::id())->count();
       if($count_shippingaddress==1){
           DB::table('delivery_address')->where('users_id',Auth::id())->update(['name'=>$input_data['shipping_name'],
               'address'=>$input_data['shipping_address'],
               'city'=>$input_data['shipping_city'],
               'state'=>$input_data['shipping_state'],
               'country'=>$input_data['shipping_country'],
               'pincode'=>$input_data['shipping_pincode'],
               'mobile'=>$input_data['shipping_mobile']]);
       }else{
            DB::table('delivery_address')->insert(['users_id'=>Auth::id(),
                'users_email'=>Session::get('frontSession'),
                'name'=>$input_data['shipping_name'],
                'address'=>$input_data['shipping_address'],
                'city'=>$input_data['shipping_city'],
                'state'=>$input_data['shipping_state'],
                'country'=>$input_data['shipping_country'],
                'pincode'=>$input_data['shipping_pincode'],
                'mobile'=>$input_data['shipping_mobile'],]);
       }
        DB::table('users')->where('id',Auth::id())->update(['name'=>$input_data['billing_name'],
            'address'=>$input_data['billing_address'],
            'city'=>$input_data['billing_city'],
            'state'=>$input_data['billing_state'],
            'country'=>$input_data['billing_country'],
            'pincode'=>$input_data['billing_pincode'],
            'mobile'=>$input_data['billing_mobile']]);
       return redirect('/order-review');

    }

    public function done (Request $request)
    {
      Stripe\Stripe::setApiKey('sk_test_51H9WVNG0lpSEKIa9Virpl0wGa58vrXb3robxHRaGPM7SLW2B7zDXoDLj7TdpHnujftxXXPMvQ6G5sBxP68Jqwblj00rG37UEbu');
      try{
        Stripe\Charge::create( array(
            "amount" => 30 *100,
            "currency" => "usd",
            "source" => $request->stripe_token_tmp,
            "description" => "Sample Description"
          ));
            Session::flash('success-message', "Payment Done Successfully");
            $user = Auth::user();
            DB::table('users')
            ->where('id', $user->id)
            ->update(['teacherStatus' => 1]);
            $teacher = DB::table('users')->where([
            ['role', '=', '1'],
            ['teacherStatus', '=', '1'],
        ])->get();
            return view('profile.student.student-dashboard', ['teacher' => $teacher], ['user' => $user]);
      }catch( Exception $e){
          Session::flash('fail-message', "Try Again Later");
            return redirect::back();
      }
    }
}
