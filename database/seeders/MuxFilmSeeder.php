<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;

class MuxFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('films') as $filmData) {
            Film::updateOrCreate(
                ['mux_playback_id' => $filmData['mux_playback_id']],
                $filmData
            );
        }
    }
}
