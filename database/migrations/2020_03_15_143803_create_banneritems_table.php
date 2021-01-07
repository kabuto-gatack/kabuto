<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanneritemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banneritems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('banner_id')->default(0);//外键，与banner表的id关联
            $table->string('picture',150);//图片
            $table->string('alt',80)->nullable();//图片关键字
            $table->string('title',60);//主题
            $table->string('digest',150);//摘要
            $table->integer('sort')->default(100);//排序
            $table->integer('isshow')->default(1)->comment("1：显示  0：不显示");//是否显示
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
        Schema::dropIfExists('banneritems');
    }
}
