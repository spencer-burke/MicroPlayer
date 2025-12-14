<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchHistory extends Model
{
    protected $fillable = [
        'profile_id',
        'film_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
