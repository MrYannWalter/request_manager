<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        
        Category::create([
            'category_name' => 'Problème Technique',
            'description' => 'Problèmes liés aux outils, sites ou logiciels utilisés.',
        ]);

        Category::create([
            'category_name' => 'Demande d\'information',
            'description' => 'Questions générales sur les services ou informations nécessaires.',
        ]);

        Category::create([
            'category_name' => 'Problème Administratif',
            'description' => 'Problèmes liés aux documents administratifs ou demandes spécifiques.',
        ]);
    }
}
