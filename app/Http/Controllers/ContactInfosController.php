<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactInfosController extends Controller
{
    public function change(Request $request){
//  return json_encode($request);
        $user = DB::table('contact_infos')->where('user_id','=',$request->user_id)->first();
       
        if(json_encode($user) !='null'){
                //有信息的话就先删除原有信息
            DB::table('contact_infos')->where('user_id','=',$request->user_id)->delete();
        }   

        DB::table('contact_infos')->insert(
            [
             'user_id' => $request->user_id,
             'receiver_name' =>$request->receiver_name,
             'phone_num'=>$request->phone_num,
             'address'=>$request->address,
             ]
            );
     }

     public function get($user_id){
  
        $user = DB::table('contact_infos')->where('user_id','=',$user_id)->first();
        return json_encode($user);
     }
}