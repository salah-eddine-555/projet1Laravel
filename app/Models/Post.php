<?php
namespace App\Models;
use App\Models\categorie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["titre", "content","categorie_id","image"];

    

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
