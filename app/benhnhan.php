<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class benhnhan extends Model
{
    protected $table = 'benhnhan';
     public $timestamp = false;
     protected $fillable=['hovaten','ngaysinh','gioitinh','ngaykham','sodienthoai','id_benhvien','id_bacsi','id_chuyenkhoa','id_user','id_khunggio'];
     public function bacsi(){
         return $this->belongsTo('App\bacsi', 'id_bacsi', 'id');
     }
     public function benhvien(){
        return $this->belongsTo('App\benhvien', 'id_benhvien', 'id');
    }
    public function chuyenkhoa(){
        return $this->belongsTo('App\chuyenkhoa', 'id_chuyenkhoa', 'id');
    }
    public function User(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function khunggio(){
        return $this->belongsTo('App\khunggio', 'id_khunggio', 'id');
    }
    public function sms(){
        return $this->hasMany('App\sms', 'id_sms', 'id');
    }
}
