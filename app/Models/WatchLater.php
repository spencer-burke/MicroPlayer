<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WatchLater extends Model
{
    use HasFactory;
    //
    protected $fillable = [
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
