<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['content', 'user_id'];

    // 一体多
    public function user()
    {
        // 単数形user 一人　他は多。
        return $this->belongsTo(User::class);
    }
}
