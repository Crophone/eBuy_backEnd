<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
           
        $table->integer('user_id')->unsigned();
        $table->integer('good_id')->unsigned();

        $table->string('good_name')->comment("商品名称");
        $table->integer('good_price')->comment("商品单价");
        $table->integer('good_num')->comment("商品数量");
        $table->string('image_url')->comment("商品图片路径");

    });

    Schema::table('shopping_lists', function($table)
{
    //外码依赖
    $table->foreign('user_id')->comment("用户编号")->references('user_id')->on('myusers');
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
