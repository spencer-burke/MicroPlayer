<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilmRecommendation extends Model
{
    use hasFactory;
    //
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
