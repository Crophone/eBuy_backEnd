<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('contact_infos', function (Blueprint $table) {
            $table->integer('user_id')->comment("用户编号")->unsigned();
            $table->string('receiver_name')->comment("收货人姓名")->default("易买用户");
            $table->string('phone_num')->comment("收货人电话");
            $table->string('address')->comment("收货人具体地址");
        });

        // Schema::table('contract_infos', function($table){
        //     $table->foreign('user_id')->references('user_id')->on('myusers');
        //     });
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
