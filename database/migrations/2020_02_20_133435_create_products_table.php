<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid');//所属分类的id
            $table->string ('productname');
            $table->string('keyword')->nullable();//关键字
            $table->string('picture')->nullable();//图片
            $table->string('alt',80)->nullable();//图片关键字
            $table->longText('desc')->nullable();//描述
            $table->longText('remark');//摘要
            $table->integer('recommend')->default(0);//推荐
            $table->integer('read')->default(0);//阅览次数
            $table->text('contents');//内容
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
        Schema::dropIfExists('products');
    }
}
