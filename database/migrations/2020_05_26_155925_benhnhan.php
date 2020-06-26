<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Benhnhan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benhnhan', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->string('hovaten'); //Kiểu chuỗi
            $table->date('ngaysinh'); //Kiểu chuỗi
            $table->string('gioitinh'); //Kiểu chuỗi
            $table->date('ngaykham'); //Kiểu chuỗi
            $table->string('sodienthoai');
            $table->unsignedBigInteger('id_benhvien'); // khai báo khóa ngoại
            $table->foreign('id_benhvien')->references('id')->on('benhvien'); 
            $table->unsignedBigInteger('id_khunggio'); //Kiểu int
            $table->foreign('id_khunggio')->references('id')->on('khunggio');
            $table->unsignedBigInteger('id_bacsi'); //Kiểu int
            $table->foreign('id_bacsi')->references('id')->on('bacsi');
            $table->unsignedBigInteger('id_user'); 
            $table->foreign('id_user')->references('id')->on('users');
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
