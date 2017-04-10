<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHinh extends Model
{
    protected $table = 'cauhinhs';
    protected $fillable = [
        'hinh', 'noidung','order', 'user_id'
    ];
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
