<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveStreamings extends Model
{
    use HasFactory;

    public function user()
  	{
  		return $this->belongsTo(User::class)->first();
  	}

    public function comments()
    {
      return $this->hasMany(LiveComments::class);
    }

    public function likes()
    {
      return $this->hasMany(LiveLikes::class);
    }

    public function onlineUsers()
    {
      return $this->hasMany(LiveOnlineUsers::class)
        ->where('updated_at', '>', now()->subSeconds(10));
    }
}
