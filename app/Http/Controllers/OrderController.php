<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    // public function all($user_id)
    // {
    //     //获取用户所有订单信息
    //     $orders = DB::table('orders')
    //     ->where('orders.user_id', '=', $user_id)
    //     ->join('order_lists','orders.order_id', '=', 'order_lists.order_id')
    //     ->get();
    //     return json_encode($orders);
    // }
        public function get(  $user_id, $order_id){
            $orders = DB::table('orders')
            ->where([['orders.user_id', '=', $user_id],['orders.order_id','=',$order_id]])
            ->get();
            return json_encode($orders);

        }
    public function create(Request $request)
    {

        $order = new Order;
        $order->user_id = $request->user_id;
        $order->receiver_name = $request->receiver_name;
        $order->phone_num = $request->phone_num;
        $order->address = $request->address;
        $order->cost = $request->cost;

        if ($order->save()) {
            //Eloquent 默认每张表的主键名为 id
             return $order->id;
        } else {
           return "订单添加失败";
        }
    }


}
