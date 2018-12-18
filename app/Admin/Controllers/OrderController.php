<?php

namespace App\Admin\Controllers;

use App\Order;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class OrderController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('订单')
            ->description('全部订单')
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
            ->header('Detail')
            ->description('description')
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
            ->header('Edit')
            ->description('description')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    //用于查看的展示页
    protected function grid()
    {
        $grid = new Grid(new Order);
        //$grid->id('ID')->sortable();
        $grid->order_id('订单编号');
        $grid->user_id('用户编号')->sortable();
        $grid->phone_num('客户电话');
        $grid->address('送货地址');
        $grid->receiver_name('收货人姓名');
        $grid->cost('总价');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        // filter($callback)方法用来设置表格的简单搜索框
        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            //$filter->disableIdFilter();
        
            // 在这里添加字段过滤器
            $filter->equal('user_id', 'user_id');
            //$filter->equal('order_id', 'order_id');
            // 设置created_at字段的范围查询
            $filter->between('created_at', 'Created Time')->datetime();
        
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));
        // $show->id('Id');
        // $show->created_at('Created at');
        // $show->updated_at('Updated at');
        // $show->user_name('User name');
        // $show->phone_num('Phone num');
        // $show->address('Address');
        // $show->list_id('List id');
        // $show->total_price('Total price');
        $show->order_id('订单编号');
        $show->user_id('用户编号');
        $show->phone_num('客户电话');
        $show->address('送货地址');
        $show->receiver_name('收货人姓名');
        $show->cost('总价');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */

     //表单生成
    protected function form()
    {
        $form = new Form(new Order);
        $form->text('order_id', '订单编号');
        $form->text('user_id', '用户编号');

        $form->text('phone_num', '客户电话');
        $form->text('address', '送货地址');
        $form->text('receiver_name', '收货人姓名');
        $form->decimal('cost', '总价');
        $form->text('created_at', 'Created at');
        $form->text('updated_at', 'Updated at'); 
        return $form;
    }
    
    public function newOrder(Content $content){
        return $content
            ->body($this->form());
    }
}
