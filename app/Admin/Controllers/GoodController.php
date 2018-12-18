<?php

namespace App\Admin\Controllers;

use App\Good;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class GoodController extends Controller
{
    use HasResourceActions;



    public function requireAllGood(){
        $goods= DB::select('select * from goods');
        return $goods;
    }
    public function requireOneGood($id=null){
        // echo $id;
        if ($id == null){
            $goods= DB::select('select * from goods');
            return $goods;
        }
        $good= DB::select('select * from goods where id = ?',[$id]);
        return $good;
    }
    public function insertGood(){
        // DB::insert('insert into users (id, name) values (?, ?)', [1, '学院君']);
        $data = Input::all();
        echo $data;
    }
    public function testPost(){
      return  
      '<form action="/good/addOrder" method="POST">
              <input  name="user_name" value="user_name">
              <input name="phone_num"  value="phone_num">
              <input name="address"  value="address">
              <input name="list_id"  value="list_id">
              <input name="total_price"  value="total_price">
            </form>';

    }
    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('商品')
            ->description('全部商品')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('商品')
            ->description('商品详情')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('商品')
            ->description('编辑')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('商品')
            ->description('上架商品')
            ->body($this->myCreateGood());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Good);

        $grid->good_id('Id')->sortable();
        $grid->good_name('商品名称');
        $grid->good_price('单价')->sortable();
        $grid->good_sales('销量');
        $grid->good_abstract('商品简述');
        $grid->good_description('商品详情');
        $grid->created_at('上架时间');
        $grid->image_url('图片路径');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($good_id)
    {
        $show = new Show(Good::findOrFail($good_id));


        $show->good_id('Id');
        $show->good_name('商品名称');
        $show->good_price('单价');
        $show->good_sales('销量');
        $show->good_abstract('商品简述');
        $show->good_description('商品详情');
        $show->created_at('上架时间');
        $show->image_url('图片路径');

        return $show;
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Good);

        $form->text('good_id', 'Id');
        $form->text('good_name', '商品名称');
        $form->decimal('good_price', '单价');
        $form->decimal('good_sales', '销量');
        $form->text('good_abstract', '商品简述');
        $form->text('good_description', '商品详情');
        $form->text('created_at', '上架时间');

        $form->text('image_url', '图片路径');

        return $form;
        //return $this->myCreateGood();
    }
    


    protected function myCreateGood(){

        return 
        '<form action="/goods/create" method="POST" enctype="multipart/form-data" >
             <br />
            <td>商品名称</td>
            <input name="good_name" value="商品名称"> 
                
            <br />
            <td>商品类别</td>
            <input name="good_type" value="商品类别"> 
               
            <br />
            <td>价格</td>
            <input name="good_price" value="价格"> 
               
            <br />
            <td>销量</td>
            <input name="good_sales" value="销量"> 
                
            <br />
            <td>商品简述</td>
            <input name="good_abstract" value="商品简述"> 
              
            <br />
            <td>商品详情</td>
            <input name="good_description" value="商品详情">
              
            <br />
            <br />
            <td>商品图片</td>
            <input type ="file" name="file" >
             
            <br />
            <br />
            <button type="submit">上架商品 </button> 
        </form>';
//window.location.href="http://127.0.0.1:8000/admin/goods";
    }



}
