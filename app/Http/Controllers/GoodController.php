<?php

namespace App\Http\Controllers;
use App\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GoodController extends Controller
{
    public function all()
    {
        $goods = DB::table('goods')->get();
        return  json_encode($goods);
    }
    
    public function form(){
  
        return '<form action="/goods/create" method="POST" enctype="multipart/form-data" >

                <input name="good_name" value="商品名称"> 
                <input name="good_type" value="商品类别"> 
                <input name="good_price" value="价格"> 
                <input name="good_sales" value="销量"> 
                <input name="good_abstract" value="商品简述"> 
                <input name="good_description" value="商品详情">
                <input type ="file" name="file" >
             
                <button type="submit"> 提交</button>
                </form>';
       
    }



    public function image($image){
        //图片响应
            $header = ['Content-type'=>'image/jpeg'];
            $imagePath = base_path() .'/public/images/'  .$image;
            return response()->file($imagePath ,$header);
    }


    public function goodsliders(){
        $goods = DB::table('goods')->take(3)->get();
        $data = json_encode($goods);
        return $data;
    }

}
