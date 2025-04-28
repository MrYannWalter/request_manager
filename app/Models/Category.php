<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name', 
        'description',
    ];

    // Si tu veux récupérer toutes les requêtes associées à cette catégorie
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
