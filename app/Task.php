<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['content','user_id','status'];

    public function user()
    {
        // 一対多の関係を記載
        return $this->belongsTo(User::class);
    }


}
