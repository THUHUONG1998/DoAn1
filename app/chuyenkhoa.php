<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chuyenkhoa extends Model
{
    protected $table = 'chuyenkhoa';
     public $timestamp = false;
     protected $fillable = [
        'tenchuyenkhoa', 'id_benhvien',
    ];
     public function benhvien(){
         return $this->belongsTo('App\benhvien', 'id_benhvien', 'id');
     }
     public function benhnhan(){
         return $this->hasMany('App\benhnhan', 'id_chuyenkhoa', 'id');
     }
     public function bacsi(){
         return $this->hasMany('App\bacsi', 'id_chuyenkhoa', 'id');
     }
}
