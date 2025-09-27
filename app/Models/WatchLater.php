<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchLater extends Model
{
    //
    protected $fillable = [
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
