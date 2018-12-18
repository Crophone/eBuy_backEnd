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

    public function create(Request $request){

        if (file_exists("../public/images/" . $_FILES["file"]["name"])) {
                        echo $_FILES["file"]["name"] . " already exists. ";
                    } else {
                        move_uploaded_file($_FILES["file"]["tmp_name"], "../public/images/" . $_FILES["file"]["name"]);
                    }
        $imagePath = "http://127.0.0.1:8000/public/images/" . $_FILES["file"]["name"];
        echo "<br>";
        $good = new Good;
        $good->good_name = $request->good_name;
        $good->good_type = $request->good_type;
        $good->good_price = $request->good_price;
        $good->good_sales = $request->good_sales;
        $good->good_abstract = $request->good_abstract;
        $good->good_description = $request->good_description;

        $good->image_url = $imagePath;
                
        if ($good->save()) {
            echo '添加商品成功！';
        } else {
            echo '添加商品失败！';
        }
        return \redirect('admin/goods');
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
