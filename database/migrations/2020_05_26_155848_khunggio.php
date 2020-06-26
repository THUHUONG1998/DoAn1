<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Khunggio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khunggio', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->string('khunggio'); //Kiểu chuỗi
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
