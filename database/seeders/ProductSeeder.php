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
        // Fetch categories once
        $catAtasan = Category::where('slug', 'atasan')->first();
        $catBawahan = Category::where('slug', 'bawahan')->first();
        $catDress = Category::where('slug', 'dress')->first();
        $catSepatu = Category::where('slug', 'sepatu')->first();

        // Helper function to clean price
        $cleanPrice = function ($priceString) {
            return (int) str_replace(['Rp', '.'], '', $priceString);
        };

        // --- KATEGORI ATASAN ---
        if ($catAtasan) {
            Product::updateOrCreate(
                ['slug' => Str::slug('Baju Training Sport')],
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Baju Training Sport',
                    'description' => 'Baju training sport yang nyaman untuk aktivitas olahraga Anda.',
                    'price' => $cleanPrice('Rp76.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Baju Training Sport.jpg',
                    'attributes' => ['size' => 'XL'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Jaket Hoodie Pria')],
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Jaket Hoodie Pria',
                    'description' => 'Jaket hoodie pria stylish dan hangat.',
                    'price' => $cleanPrice('Rp85.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Jaket Hoodie.jpg',
                    'attributes' => ['size' => 'L'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Kaos Pria Row 3')], // Kaos Pria pertama dari spreadsheet
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Kaos Pria',
                    'description' => 'Kaos pria bahan berkualitas ukuran XL.',
                    'price' => $cleanPrice('Rp50.000'),
                    'stock' => 50,
                    'main_image_filename' => 'kaospria.png',
                    'attributes' => ['size' => 'XL'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Kemeja Wanita')],
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Kemeja Wanita',
                    'description' => 'Kemeja wanita formal dan kasual.',
                    'price' => $cleanPrice('Rp75.000'),
                    'stock' => 50,
                    'main_image_filename' => 'kemejawanita.png',
                    'attributes' => ['size' => 'M'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Kemeja Lengan Panjang Pria')], // Slug diperbaiki
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Kemeja Lengan Panjaang Pria', // Sesuai spreadsheet
                    'description' => 'Kemeja lengan panjang pria untuk tampilan rapi.',
                    'price' => $cleanPrice('Rp55.000'),
                    'stock' => 50,
                    'main_image_filename' => 'kemeja.png',
                    'attributes' => ['size' => 'XL'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Kaos Pria Row 6')], // Kaos Pria kedua dari spreadsheet
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Kaos Pria',
                    'description' => 'Kaos pria nyaman ukuran L.',
                    'price' => $cleanPrice('Rp65.000'),
                    'stock' => 50,
                    'main_image_filename' => 'kaos.png',
                    'attributes' => ['size' => 'L'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Blazer Formal Wanita')],
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Blazer Formal Wanita',
                    'description' => 'Blazer formal wanita untuk acara resmi.',
                    'price' => $cleanPrice('Rp75.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Blazer Formal Wanita.jpg',
                    'attributes' => ['size' => 'M'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Blouse Putih Strip')],
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Blouse Putih Strip',
                    'description' => 'Blouse putih dengan motif strip yang menawan.',
                    'price' => $cleanPrice('Rp50.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Blouse Putih.png',
                    'attributes' => ['size' => 'S'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Cardigan Rajut')],
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Cardigan Rajut',
                    'description' => 'Cardigan rajut hangat dan modis.',
                    'price' => $cleanPrice('Rp75.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Cardigan Rajut.jpg',
                    'attributes' => ['size' => 'M'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Sweater Polos Unisex')],
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Sweater Polos Unisex',
                    'description' => 'Sweater polos unisex, cocok untuk pria dan wanita.',
                    'price' => $cleanPrice('Rp60.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Sweater.jpg',
                    'attributes' => ['size' => 'L'],
                    'is_new_product' => true,
                ]
            );
            // Kaos Polos Loopin dari kode lama (jika berbeda dari Kaos Pria di spreadsheet)
            Product::updateOrCreate(
                ['slug' => Str::slug('Kaos Polos Loopin')],
                [
                    'category_id' => $catAtasan->id,
                    'name' => 'Kaos Polos Loopin',
                    'description' => 'Kaos polos nyaman dari Loopin.', // Deskripsi dari kode lama
                    'price' => 85000, // Harga dari kode lama
                    'stock' => 50,    // Stock dari kode lama
                    'main_image_filename' => 'kaospria.png', // Gambar dari kode lama (atau sesuaikan)
                    'attributes' => ['size' => 'L', 'color' => 'Hitam'], // Atribut dari kode lama
                    'is_new_product' => true,
                ]
            );
        }

        // --- KATEGORI BAWAHAN ---
        if ($catBawahan) {
            Product::updateOrCreate(
                ['slug' => Str::slug('Celana Jogger')],
                [
                    'category_id' => $catBawahan->id,
                    'name' => 'Celana Jogger',
                    'description' => 'Celana jogger kasual dan nyaman.',
                    'price' => $cleanPrice('Rp33.000'),
                    'stock' => 50,
                    'main_image_filename' => 'jogger.png',
                    'attributes' => ['size' => 'M'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Rok Mini Abu-Abu')], // Menggantikan 'Rok Mini' generik dari kode lama
                [
                    'category_id' => $catBawahan->id,
                    'name' => 'Rok Mini Abu-Abu',
                    'description' => 'Rok mini trendy warna abu-abu untuk gaya kasual.', // Deskripsi disesuaikan
                    'price' => $cleanPrice('Rp30.000'),
                    'stock' => 25, // Stock dari 'Rok Mini' kode lama
                    'main_image_filename' => 'rookmini.png',
                    'attributes' => ['size' => 'S'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Rok Mini Coklat')], // Menggantikan 'Rok Coklat' dari kode lama
                [
                    'category_id' => $catBawahan->id,
                    'name' => 'Rok Mini Coklat',
                    'description' => 'Rok panjang coklat elegan.', // Deskripsi dari 'Rok Coklat' kode lama
                    'price' => $cleanPrice('Rp50.000'),
                    'original_price' => 135000, // Dari 'Rok Coklat' kode lama
                    'stock' => 10,               // Dari 'Rok Coklat' kode lama
                    'main_image_filename' => 'rokcoklat.png',
                    'attributes' => ['size' => 'S'], // Ukuran dari spreadsheet
                    'is_new_product' => true,
                    'is_big_deal' => true,    // Dari 'Rok Coklat' kode lama
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Celana Jeans Slim Fit')],
                [
                    'category_id' => $catBawahan->id,
                    'name' => 'Celana Jeans Slim Fit',
                    'description' => 'Celana jeans model slim fit modern.',
                    'price' => $cleanPrice('Rp67.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Celana Jeans.jpg',
                    'attributes' => ['size' => 'XL'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Celana Wanita Cream')],
                [
                    'category_id' => $catBawahan->id,
                    'name' => 'Celana Wanita Cream',
                    'description' => 'Celana wanita warna cream serbaguna.',
                    'price' => $cleanPrice('Rp80.000'),
                    'stock' => 50,
                    'main_image_filename' => 'celanacream.png',
                    'attributes' => ['size' => 'M'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Rok Plisket')],
                [
                    'category_id' => $catBawahan->id,
                    'name' => 'Rok Plisket',
                    'description' => 'Rok plisket anggun dan flowy.',
                    'price' => $cleanPrice('Rp35.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Rok Plisket.jpg',
                    'attributes' => ['size' => 'M'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Celana Cutbray')],
                [
                    'category_id' => $catBawahan->id,
                    'name' => 'Celana Cutbray',
                    'description' => 'Celana cutbray gaya retro.',
                    'price' => $cleanPrice('Rp39.000'),
                    'stock' => 50,
                    'main_image_filename' => 'cutbray.png',
                    'attributes' => ['size' => 'S'],
                    'is_new_product' => true,
                ]
            );
        }

        // --- KATEGORI DRESS ---
        if ($catDress) {
            Product::updateOrCreate(
                ['slug' => Str::slug('Gamis Wanita')],
                [
                    'category_id' => $catDress->id,
                    'name' => 'Gamis Wanita',
                    'description' => 'Gamis wanita muslimah modern.',
                    'price' => $cleanPrice('Rp70.000'),
                    'stock' => 50,
                    'main_image_filename' => 'gamis.png',
                    'attributes' => ['size' => 'XL'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('One Set Kemeja & Rok Mini')],
                [
                    'category_id' => $catDress->id,
                    'name' => 'One Set Kemeja & Rok Mini',
                    'description' => 'Setelan kemeja dan rok mini yang chic.',
                    'price' => $cleanPrice('Rp79.000'),
                    'stock' => 50,
                    'main_image_filename' => 'oneset.png',
                    'attributes' => ['size' => 'S'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Elegant Dress')],
                [
                    'category_id' => $catDress->id,
                    'name' => 'Elegant Dress',
                    'description' => 'Dress elegan untuk acara spesial.',
                    'price' => $cleanPrice('Rp99.000'),
                    'stock' => 50,
                    'main_image_filename' => 'elegantdress.png',
                    'attributes' => ['size' => 'M'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Slim Dress')],
                [
                    'category_id' => $catDress->id,
                    'name' => 'Slim Dress',
                    'description' => 'Dress model slim yang menonjolkan siluet.',
                    'price' => $cleanPrice('Rp95.000'),
                    'stock' => 50,
                    'main_image_filename' => 'slimdress.png',
                    'attributes' => ['size' => 'L'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Mini Dress')],
                [
                    'category_id' => $catDress->id,
                    'name' => 'Mini Dress',
                    'description' => 'Mini dress untuk tampilan yang playful.',
                    'price' => $cleanPrice('Rp88.000'),
                    'stock' => 50,
                    'main_image_filename' => 'Dress Mini.jpg',
                    'attributes' => ['size' => 'S'],
                    'is_new_product' => true,
                ]
            );
             // Dress Bunga Musim Panas dari kode lama (jika berbeda dari Gamis Wanita di spreadsheet)
            Product::updateOrCreate(
                ['slug' => Str::slug('Dress Bunga Musim Panas')],
                [
                    'category_id' => $catDress->id,
                    'name' => 'Dress Bunga Musim Panas',
                    'description' => 'Dress cantik dengan motif bunga untuk musim panas.', // Deskripsi dari kode lama
                    'price' => 250000, // Harga dari kode lama
                    'stock' => 15,     // Stock dari kode lama
                    'main_image_filename' => 'Dress Bunga Musim Panas.jpg', // Gambar dari kode lama (sesuaikan jika perlu, spreadsheet juga ada 'gamis.png' untuk 'Gamis Wanita')
                    'attributes' => ['size' => 'M', 'color' => 'Kuning Motif'], // Atribut dari kode lama
                    'is_new_product' => true,
                ]
            );
        }

        // --- KATEGORI SEPATU ---
        if ($catSepatu) {
            Product::updateOrCreate(
                ['slug' => Str::slug('Sepatu Hitam Putih')],
                [
                    'category_id' => $catSepatu->id,
                    'name' => 'Sepatu Hitam Putih',
                    'description' => 'Sepatu kasual unisex dengan desain simpel dan klasik, cocok untuk segala gaya. Terbuat dari bahan kanvas berkualitas dan sol karet yang empuk, nyaman dipakai untuk aktivitas harian.', // Deskripsi dari kode lama
                    'price' => $cleanPrice('Rp68.000'),
                    'stock' => 20, // Stock dari kode lama
                    'main_image_filename' => 'Sepatu Hitam Putih.jpeg',
                    'attributes' => ['size' => '42', 'color' => 'Hitam Putih'], // Atribut lengkap dari kode lama
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Sneakers')],
                [
                    'category_id' => $catSepatu->id,
                    'name' => 'Sneakers',
                    'description' => 'Sneakers trendi untuk gaya sehari-hari.',
                    'price' => $cleanPrice('Rp85.000'),
                    'stock' => 50,
                    'main_image_filename' => 'sneakers.jpg',
                    'attributes' => ['size' => '41'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Heels Pantofel')],
                [
                    'category_id' => $catSepatu->id,
                    'name' => 'Heels Pantofel',
                    'description' => 'Heels pantofel elegan untuk acara formal.',
                    'price' => $cleanPrice('Rp95.000'),
                    'stock' => 50,
                    'main_image_filename' => 'pantofel.png',
                    'attributes' => ['size' => '38'],
                    'is_new_product' => true,
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Sepatu Sekolah')],
                [
                    'category_id' => $catSepatu->id,
                    'name' => 'Sepatu Sekolah',
                    'description' => 'Sepatu sekolah nyaman dan tahan lama.', // Deskripsi dari kode lama
                    'price' => $cleanPrice('Rp76.000'), // Harga dari spreadsheet
                    'original_price' => 110000,         // Dari kode lama
                    'stock' => 15,                       // Dari kode lama
                    'main_image_filename' => 'Sepatu Sekolah.png', // Dari spreadsheet (kode lama 'sepatu2.png')
                    'attributes' => ['size' => '40'],    // Dari spreadsheet
                    'is_new_product' => true,            // Bisa juga true jika ini update terbaru
                    'is_big_deal' => true,               // Dari kode lama
                ]
            );
            Product::updateOrCreate(
                ['slug' => Str::slug('Sepatu PDH')],
                [
                    'category_id' => $catSepatu->id,
                    'name' => 'Sepatu PDH',
                    'description' => 'Sepatu PDH berkualitas untuk dinas.',
                    'price' => $cleanPrice('Rp82.000'),
                    'stock' => 50,
                    'main_image_filename' => 'sepatupdh.jpg',
                    'attributes' => ['size' => '44'],
                    'is_new_product' => true,
                ]
            );
        }
    }
}