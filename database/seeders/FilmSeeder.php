<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $response = Http::withOptions(['verify' => false])->get('https://swapi.dev/api/films/');
            $films = $response->json()['results'];
    

        foreach($films as $film){
            Film::create([
                'title'=>$film["title"],
                'release_date'=>$film['release_date'],
            ]);
        }
    }
}
