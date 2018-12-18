<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   //列表
        //一个用户多个订单，一个订单多个列表（多个商品) （已支付订单） user_id*order_id*
         
        Schema::create('order_lists', function (Blueprint $table) {

        //3个外码做主码
        $table->integer('user_id')->unsigned();
        $table->integer('order_id')->unsigned();
        $table->integer('good_id')->unsigned();
    
        $table->string('good_name')->comment("商品名称");
        $table->integer('good_price')->comment("商品单价");
        $table->integer('good_num')->comment("商品数量");
        $table->string('image_url')->comment("商品图片路径");

    });

    Schema::table('order_lists', function($table)
    {
        //外码依赖
        $table->foreign('user_id')->comment("用户编号")->references('user_id')->on('myusers');
        $table->foreign('order_id')->comment("订单编号")->references('order_id')->on('orders');
        $table->foreign('good_id')->comment("商品编号")->references('good_id')->on('goods');
        // $table->string('image_url')->comment("商品图片路径")->references('image_url')->on('goods');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
