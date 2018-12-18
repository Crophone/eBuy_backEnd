<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShoppingListsController extends Controller
{
   
    //根据user_id查询购物车
    public function one($user_id){
       
        return  DB::table('shopping_lists')
             ->where('user_id', '=', $user_id)
             ->get();
     }

    
     //购物车加入一条记录
    public function insertone(Request $request)
     {
      
        $one = DB::table('shopping_lists')->where([['good_id','=',$request->good_id],['user_id','=',$request->user_id]])
        ->first();
       
        if(json_encode($one) !='null'){
            
            //有就更新
            $num = $request->good_num + $one ->good_num;
            
            DB::table('shopping_lists')
            ->where([['good_id','=',$request->good_id],['user_id','=',$request->user_id]])
            ->update(['good_num' =>$num ]);
        }   
        else{

            DB::table('shopping_lists')->insert(
                [
                 'user_id' => $request->user_id,
                 'good_id' =>$request->good_id,
                 'good_name'=>$request->good_name,
                 'good_price'=>$request->good_price,
                 'good_num'=>$request->good_num,
                 'image_url'=>$request->image_url,

                 ]  
                 
            );
            return 'ok';

            return json_encode($one);
        }

    
     }



     //购物车加入多条记录,同时清空其他购物车数据
     public function insertmany(Request $request)
     {
        $user_id =  $request->user_id;
  
        $user = DB::table('shopping_lists')->where('user_id','=',$user_id)->first();
        if(json_encode($user) !='null'){
                DB::table('shopping_lists')->where('user_id','=',$user_id)->delete();
        }   

        $shopping_list = $request->shopping_list;

         foreach($shopping_list as $v){
            DB::table('shopping_lists')->insert( $v);
         }

     }
}
