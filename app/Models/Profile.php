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

    protected $hidden = [
        'user_id'
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
}
