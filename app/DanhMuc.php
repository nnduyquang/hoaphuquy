<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danhmucs';
    protected $fillable = [
        'display_name', 'path', 'user_id'
    ];
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function sanphams(){
        return $this->hasMany('App\SanPham');
    }
}
