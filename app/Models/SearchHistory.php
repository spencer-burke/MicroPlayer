<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $fillable = [
        ''
    ];

    protected $casts = [
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
