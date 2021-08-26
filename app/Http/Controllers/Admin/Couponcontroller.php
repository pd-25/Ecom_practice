<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupons;

class Couponcontroller extends Controller
{
    //
    public function coupon(){
        
        $data['coupons'] = Coupons::get();
        return view('admin.coupon', $data);
       
   }

   public function addcoupon(){
       return view('admin.addcoupon');
   }

   public function createcoupon(Request $request){
    $validcop = $request->validate([
        /*form name here--*/ 'coupon_name' => 'required',
                             'coupon_code' => 'required',
                             'value' => 'required',
    ]);
    $instr_data = array(
/*database colom name here--*/ 'Coupon_name' =>$request->coupon_name,/*form name here*/
                            'Coupon_code' => $request->coupon_code,
                            'value' => $request->value,
                            );
                            $resp =Coupons::insert($instr_data);
                            if($resp){
                                $request->session()->flash('message', 'Your data has been successfully inserted!');
                            }else{
                                $request->session()->flash('message', 'Something went wrong!');
                            }
                            return redirect('admin/coupon');  
   }

   public function editcoupon(Request $request){
    $data['coupons'] = Coupons::where('id', $request->id)->first();
    return view('admin.editcoupon', $data);
   }
   public function updatecoupon(Request $request){
    $update_arr = array(
        'Coupon_name' => $request->coupon_name,
        'Coupon_code' => $request->coupon_code,
        'value' => $request->value,
    );
    $resp =Coupons::where('id', $request->id)->update($update_arr);
    if($resp){
        $request->session()->flash('message', 'Your date has been successfully updated!');
    }else{
        $request->session()->flash('message', 'Your date has been successfully updated!');
    }
    return redirect('admin/coupon');
   }

   public function deleteCoupon(Request $request){
    if( Coupons::where('id',$request->delete)->delete()){
        $request->session()->flash('message', 'your data has been deleted');
    }else{
        $request->session()->flash('message', 'your data has not been deleted');
    }
    
    return redirect('admin/coupon');
   }
}
