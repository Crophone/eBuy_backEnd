<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderListController extends Controller
{
    
    public function get($user_id){
        $orders = DB::table('order_lists')->where('user_id','=',$user_id)->get();
        return json_encode($orders);
    }

    public function create(Request $request){
      
        $user_id =  $request->user_id;    
        $order_id =  $request->order_id;  
        $order_list = $request->order_list;

        foreach($order_list as $v){
            {
                DB::table('order_lists')->insert($v);
            }

        }
    }


    
}
