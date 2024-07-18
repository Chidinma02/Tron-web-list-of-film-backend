<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['film_id', 'comment'];


     // Define the inverse relationship with the Film model
     public function film()
     {
         return $this->belongsTo(Film::class);
     }
}
