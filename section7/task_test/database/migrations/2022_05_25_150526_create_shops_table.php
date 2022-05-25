<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_name', 20);
            $table->unsignedBigInteger('area_id');//FK
            $table->timestamps();
            /*
            外部キー制約は存在している数字内のデータを扱うようにする制約
            area_id が1〜3までしか存在してないのに、areaが10でもinsertできる
            のを制約する
            */
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
