<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('orders', function (Blueprint $table) {
    
        $table->increments('order_id')->comment("订单编号"); //主码
    
        $table->integer('user_id')->comment("用户编号")->unsigned(); //外码
        
        $table->string('receiver_name')->comment("收货人姓名");
        $table->string('phone_num')->comment("客户电话");
        $table->string('address')->comment("送货地址");
        $table->integer('cost')->comment("总价");

        $table->timestamps();
        });

        Schema::table('orders', function($table){
        $table->foreign('user_id')->references('user_id')->on('myusers')->onDelete('cascade');;
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
