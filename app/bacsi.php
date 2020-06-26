<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bacsi extends Model
{
    protected $table = 'bacsi';
     public $timestamp = false;
     protected $fillable = [
        'tenbacsi', 'hocvi','id_benhvien','id_chuyenkhoa'
    ];
     public function benhnhan(){
        return $this->hasMany('App\benhnhan', 'id_bacsi', 'id');
     }
     public function benhvien(){
         return $this->belongsTo('App\benhvien', 'id_benhvien', 'id');
     }
     public function chuyenkhoa(){
         return $this->belongsTo('App\chuyenkhoa', 'id_chuyenkhoa', 'id');
     }
}
