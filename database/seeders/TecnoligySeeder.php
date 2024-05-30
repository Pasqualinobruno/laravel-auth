<?php

namespace Database\Seeders;

use App\Models\Tecnoligy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnoligySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'PHP',
            'Laravel',
            'Vue.js',
            'HTML',
            'React',
            'CSS',
            'Angular'
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Tecnoligy();
            $newTechnology->name = $technology;
            $newTechnology->save();
        }
    }
}
