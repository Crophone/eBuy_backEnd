<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //商品
        Schema::create('goods', function (Blueprint $table) {

            $table->increments('good_id')->comment("商品编号");
            $table->string('good_name')->comment("商品名称");
            $table->string('good_type')->comment("商品类别");
            $table->integer('good_price')->comment("价格");
            $table->integer('good_sales')->comment("销量");
            $table->string('good_abstract')->comment("商品简述");
            $table->text('good_description')->comment("商品详情");
            $table->string('image_url')->comment("商品图片路径");
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
