<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trang extends Model
{
    protected $table = 'trangs';
    protected $fillable = [
        'display_name', 'path','noidung','user_id'
    ];
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
