<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',60);//标题
            $table->integer('type')->default(1)->comment("1：公司简介，2：招贤纳士，3：发展历程");//类型
            $table->string('remark',150)->nullable();//摘要
            $table->string('picture',150)->nullable();//图片
            $table->string('picture1',150)->nullable();//图片
            $table->text('contents1')->nullable();//内容详情
            $table->string('picture2',150)->nullable();//图片
            $table->text('contents2')->nullable();//内容详情
            $table->date('time',6)->nullable();//时间
            $table->text('contents')->nullable();//内容详情
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
        Schema::dropIfExists('pages');
    }
}
