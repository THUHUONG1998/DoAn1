<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chuyenkhoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyenkhoa', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->string('tenchuyenkhoa'); //Kiểu chuỗi
            $table->unsignedBigInteger('id_benhvien'); //Kiểu int
            $table->foreign('id_benhvien')->references('id')->on('benhvien'); 
            $table->timestamps(); //Tự cập nhật thời gian
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
