<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sizes;

class Sizecontroller extends Controller
{
    //
    public function size(){
        $data['sizes'] = Sizes::get();
       
        return view('admin.size', $data);
    }

    public function addsize(){
        return view('admin.add_size');
    }

    public function createsize(Request $request){
        $validcat = $request->validate([
            /*form name here--*/ 'size' => 'required',
                    ]);

        $instr_data = array(
 /*database colom name here--*/ 'size' =>$request->size,/*form name here*/
                                'status' => $request->status
                                );
                                $resp =Sizes::insert($instr_data);
                                if($resp){
                                    $request->session()->flash('message', 'Your data has been successfully inserted!');
                                }else{
                                    $request->session()->flash('message', 'Something went wrong!');
                                }
                                return redirect('admin/size');            
    }

    //edit catagory--
    public function editsize(Request $request){
        
            $data['sizes'] = Sizes::where('id', $request->id)->first();
            return view('admin.editsize', $data);
        }

     public function updatesize(Request $request)
        {
            $update_arr = array(
                'size' => $request->size,
                'status' => $request->status
            );
            $resp =Sizes::where('id', $request->id)->update($update_arr);
            if($resp){
                $request->session()->flash('message', 'Your date has been successfully updated!');
            }else{
                $request->session()->flash('message', 'Your date has been successfully updated!');
            }
            return redirect('admin/size');
        }  
        
        public function deletesize(Request $request)
    {
        if( Sizes::where('id',$request->delete)->delete()){
            $request->session()->flash('message', 'your data has been deleted');
        }else{
            $request->session()->flash('message', 'your data has not been deleted');
        }
        
        return redirect('admin/size');
    }
    
}
