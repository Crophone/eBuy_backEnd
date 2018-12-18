<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;

use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;

use App\Order;
use App\Good;
use App\User;
use App\Myuser;

class HomeController extends Controller
{

    //首页
    public function index(Content $content)
    {

        $content->header('易买');
        $content->description('首页');
            // 添加面包屑导航 since v1.5.7
        $content->breadcrumb(
            ['text' => '首页', 'url' => '/'],
            ['text' => '用户管理', 'url' => '/users'],
            ['text' => '编辑用户']
        );
   

        $content->row(function (Row $row) {

            $headers = ['订单编号', '用户编号', '收货人姓名','电话号码','地址','总价','下单时间', '修改时间'];

            $order = Order::where('created_at', '>=', date('Y-m-d') . '00:00:00') ->get();
            $rows = $order->toArray();

            $table = new Table($headers, $rows);

            $box = new Box('eBuy-Order(订单列表)',$table->render() );
            $box->style('info');
            $row->column(8,  $box->render());


            $row->column(4, function (Column $column) {
                // $newUserCount = Myuser::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->count();
                // $newOrderCount = Order::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->count();
                $newUserCount = Myuser::count();
                $newOrderCount = Order::count();

               $allUserCount = Myuser::count();

                
                $newUserInfoBox = new InfoBox('当日新用户', 'users', 'aqua', '/admin/auth/users',  $newUserCount);
                $newOrderInfoBox = new InfoBox('当日新订单', 'wechat', 'red', '/admin/auth/users',  $newOrderCount);
                $allUserInfoBox = new InfoBox('所有用户', 'users', 'green', '/admin/auth/users',  $allUserCount );
                
                $column->row($newUserInfoBox->render());
                $column->row($newOrderInfoBox->render());
                $column->row($allUserInfoBox->render());
            });
       
        });

        return $content;
    }

    //


}
