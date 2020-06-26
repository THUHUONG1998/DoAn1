<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sms extends Model
{
    protected $table = 'sms';
     public $timestamp = false;
     protected $fillable=['sodienthoai','noidung','id_benhnhan'];
     public function benhnhan(){
         return $this->belongsTo('App\benhnhan', 'id_benhnhan', 'id');
     }
}
