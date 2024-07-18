<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    //

    public function index(){
        $films = Film::withCount('comments')->orderBy('release_date')->get();
        return response()->json($films);
    }
}
