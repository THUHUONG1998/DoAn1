<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bacsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bacsi', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->string('tenbacsi'); //Kiểu chuỗi
            $table->string('hocvi'); //Kiểu chuỗi
            $table->unsignedBigInteger('id_benhvien'); //Kiểu int
            $table->foreign('id_benhvien')->references('id')->on('benhvien'); 
            $table->unsignedBigInteger('id_chuyenkhoa'); //Kiểu int
            $table->foreign('id_chuyenkhoa')->references('id')->on('chuyenkhoa'); 
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
