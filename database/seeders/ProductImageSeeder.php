<?php

namespace Database\Seeders;

// database/seeders/ProductImageSeeder.php
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $productSepatu = Product::where('slug', 'sepatu-hitam-putih')->first();
        if ($productSepatu) {
            $images = ['Belakang.jpeg', 'Atas.jpeg', 'Samping.jpeg', 'Bawah.jpeg'];
            foreach ($images as $index => $image) {
                ProductImage::create([
                    'product_id' => $productSepatu->id,
                    'image_filename' => $image,
                    'order' => $index + 1,
                ]);
            }
        }
    }
}
