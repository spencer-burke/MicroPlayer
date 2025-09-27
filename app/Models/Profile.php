<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'displayname',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): Array
    {
        return [
            'displayname' => 'string',
        ];
    }

    /**
     * Get the user for the profile
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function searchHistories()
    {
        return $this->hasMany(SearchHistory::class);
    }

    public function watchLaters()
    {
        return $this->hasMany(WatchLater::class);
    }

    public function favoriteFilms()
    {
        return $this->hasMany(FavoriteFilm::class);
    }

    public function filmRecommendations()
    {
        return $this->hasMany(FilmRecommendation::class);
    }
}
