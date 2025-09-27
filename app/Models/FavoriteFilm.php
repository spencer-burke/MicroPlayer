<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteFilm extends Model
{
    //
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
