<?php

namespace App\Models;
use App\Models\categorie;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["titre", "content","categorie_id"];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
