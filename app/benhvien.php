<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class benhvien extends Model
{
    protected $table = 'benhvien';
     public $timestamp = false;

     protected $fillable = [
        'tenbenhvien', 'diachi',
    ];
     public function benhnhan()
     {
         return $this->hasMany('App\benhnhan', 'id_benhvien', 'id');
     }
     public function chuyenkhoa(){
         return $this->hasMany('App\chuyenkhoa', 'id_benhvien', 'id');
     }
     public function khunggio(){
         return $this->hasMany('App\khunggio', 'id_benhvien', 'id');
     }
     public function bacsi(){
         return $this->hasMany('App\bacsi', 'id_benhvien', 'id');
     }
}
