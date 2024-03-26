<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = [
        'user_id', 'friend_id'
    ];

    public function user1()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

}
