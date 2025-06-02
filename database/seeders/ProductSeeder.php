<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catSepatu = Category::where('slug', 'sepatu')->first();
        $catAtasan = Category::where('slug', 'atasan')->first();
        $catBawahan = Category::where('slug', 'bawahan')->first();
        $catDress = Category::where('slug', 'dress')->first();

        if ($catSepatu) {
            Product::create([
                'category_id' => $catSepatu->id,
                'name' => 'Sepatu Hitam Putih',
                'slug' => Str::slug('Sepatu Hitam Putih'),
                'description' => 'Sepatu kasual unisex dengan desain simpel dan klasik, cocok untuk segala gaya. Terbuat dari bahan kanvas berkualitas dan sol karet yang empuk, nyaman dipakai untuk aktivitas harian.',
                'price' => 68000,
                'stock' => 20,
                'main_image_filename' => 'Sepatu Hitam Putih.jpeg', 
                'attributes' => ['size' => '42', 'color' => 'Hitam Putih'],
                'is_new_product' => true,
            ]);
            Product::create([
                'category_id' => $catSepatu->id,
                'name' => 'Sepatu Sekolah',
                'slug' => Str::slug('Sepatu Sekolah'),
                'description' => 'Sepatu sekolah nyaman dan tahan lama.',
                'price' => 76000,
                'original_price' => 110000,
                'stock' => 15,
                'main_image_filename' => 'sepatu2.png',
                'is_big_deal' => true,
            ]);
        }

        if ($catBawahan) {
            Product::create([
                'category_id' => $catBawahan->id,
                'name' => 'Rok Mini',
                'slug' => Str::slug('Rok Mini'),
                'description' => 'Rok mini trendy untuk gaya kasual.',
                'price' => 30000,
                'stock' => 25,
                'main_image_filename' => 'rokmini.png',
                'attributes' => ['size' => 'S'],
                'is_new_product' => true,
            ]);
             Product::create([
                'category_id' => $catBawahan->id,
                'name' => 'Rok Coklat',
                'slug' => Str::slug('Rok Coklat'),
                'description' => 'Rok panjang coklat elegan.',
                'price' => 50000,
                'original_price' => 135000,
                'stock' => 10,
                'main_image_filename' => 'rokcoklat.png',
                'is_big_deal' => true,
            ]);
        }
        
        if ($catAtasan) {
            Product::create([
                'category_id' => $catAtasan->id,
                'name' => 'Kaos Polos Loopin',
                'slug' => Str::slug('Kaos Polos Loopin'),
                'description' => 'Kaos polos nyaman dari Loopin.',
                'price' => 85000,
                'stock' => 50,
                'main_image_filename' => 'kaospria.png', // Ganti nama file
                'attributes' => ['size' => 'L', 'color' => 'Hitam'],
                'is_new_product' => true,
            ]);
            
        }
    
        if ($catDress) {
            Product::create([
                'category_id' => $catDress->id,
                'name' => 'Dress Bunga Musim Panas',
                'slug' => Str::slug('Dress Bunga Musim Panas'),
                'description' => 'Dress cantik dengan motif bunga untuk musim panas.',
                'price' => 250000,
                'stock' => 15,
                'main_image_filename' => 'gamis.png', // Ganti nama file
                'attributes' => ['size' => 'M', 'color' => 'Kuning Motif'],
                'is_new_product' => true,
            ]);
            
        }
    }
}

