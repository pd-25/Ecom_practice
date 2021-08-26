<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;

class Catagorycontroller extends Controller
{
    //
    public function catagory(){
        $data['catagories'] = Catagory::get();
       
        return view('admin.catagory', $data);
    }

    public function addCatagory(){
        return view('admin.addCatagory');
    }

    public function createCatagory(Request $request){
        $validcat = $request->validate([
            /*form name here--*/ 'catagory_name' => 'required',
                        
                                 'catagory_slug' => 'required',
                    ]);

        $instr_data = array(
 /*database colom name here--*/ 'catagory_name' =>$request->catagory_name,/*form name here*/
                                'catagory_slug' => $request->catagory_slug,
                                'status' => $request->status
                                );
                                $resp =Catagory::insert($instr_data);
                                if($resp){
                                    $request->session()->flash('message', 'Your data has been successfully inserted!');
                                }else{
                                    $request->session()->flash('message', 'Something went wrong!');
                                }
                                return redirect('admin/catagory');            
    }

    //edit catagory--
    public function editCatagory(Request $request){
        
            $data['catagories'] = Catagory::where('id', $request->id)->first();
            return view('admin.editCatagory', $data);
        }

     public function updateCatagory(Request $request)
        {
            $update_arr = array(
                'catagory_name' => $request->catagory_name,
                'catagory_slug' => $request->catagory_slug,
                'status' => $request->status
            );
            $resp =Catagory::where('id', $request->id)->update($update_arr);
            if($resp){
                $request->session()->flash('message', 'Your date has been successfully updated!');
            }else{
                $request->session()->flash('message', 'Your date has been successfully updated!');
            }
            return redirect('admin/catagory');
        }  
        
        public function deleteCatagory(Request $request)
    {
        if( Catagory::where('id',$request->delete)->delete()){
            $request->session()->flash('message', 'your data has been deleted');
        }else{
            $request->session()->flash('message', 'your data has not been deleted');
        }
        
        return redirect('admin/catagory');
    }
    


    
}
