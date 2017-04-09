<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanphams';
    protected $fillable = [
        'display_name', 'price','noidung','lienhegia','danhmuc_id', 'user_id','anhsanpham','path'
    ];
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function danhmucs(){
        return $this->belongsTo('App\SanPham','danhmuc_id');
    }
}
