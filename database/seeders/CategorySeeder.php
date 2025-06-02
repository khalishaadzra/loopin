<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Atasan', 'icon' => 'atasanc.svg'],
            ['name' => 'Bawahan', 'icon' => 'bawahanc.svg'],
            ['name' => 'Dress', 'icon' => 'dressc.svg'],
            ['name' => 'Sepatu', 'icon' => 'sepatuc.svg'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'icon_filename' => $category['icon'],
            ]);
        }
    }
}
