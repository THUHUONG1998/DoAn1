<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khunggio extends Model
{
    protected $table = 'khunggio';
    public $timestamp = false;
    protected $fillable = [
        'khunggio', 'id_benhvien'
    ];
    public function benhvien(){
        return $this->belongsTo('App\benhvien', 'id_benhvien', 'id');
    }
    public function benhnhan(){
        return $this->hasOne('App\benhnhan', 'id_khunggio', 'id');
    }
    
}
