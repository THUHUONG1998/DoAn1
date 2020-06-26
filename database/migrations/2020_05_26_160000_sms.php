<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->string('sodienthoai'); //Kiểu chuỗi
            $table->string('noidung'); //Kiểu int
            $table->unsignedBigInteger('id_benhnhan'); //Kiểu int
            $table->foreign('id_benhnhan')->references('id')->on('benhnhan');
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
