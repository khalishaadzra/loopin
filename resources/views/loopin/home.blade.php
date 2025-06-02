<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Loopin - Home</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#A54D4D',
            secondary: '#E6D2AE',
            background: '#F9F3EB',
            dark: '#521018'
          }
        }
      }
    }
  </script>
</head>
<body class="bg-white text-[#521018]">

<!-- Navbar -->
<nav class="bg-[#F8F1E7] flex items-center justify-between px-8 py-4 shadow-sm">
  <div class="flex-shrink-0">
    {{-- Pastikan logo.svg ada di public/logo.svg --}}
    <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
  </div>
  <div class="flex space-x-20">
    {{-- Menggunakan route helper untuk link dinamis --}}
    <a href="{{ route('home') }}" class="text-white font-semibold bg-[#A54D4D] px-4 py-1 rounded-full">Home</a>
    <a href="{{ route('products.explore') }}" class="text-black font-bold hover:text-[#A54D4D]">Explore</a>
    <a href="{{ route('categories.index') }}" class="text-black font-bold hover:text-[#A54D4D]">Category</a>
  </div>
  <div class="flex items-center space-x-4">
    {{-- Fitur search bisa diimplementasikan nanti --}}
    <input type="text" placeholder="Lagi Mau Cari Apa?" class="bg-white text-sm px-4 py-1.5 rounded-md shadow border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#A54D4D]">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#521018]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z" />
    </svg>
    <a href="{{ route('cart.index') }}" class="p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#521018]" viewBox="0 0 24 24" fill="currentColor">
          <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zM7.334 13l.94 2h8.412l3.264-7H6.25l-1-2H2v2h2l3.6 7.59L5.25 17h13v-2H7.334z"/>
        </svg>
      </a>
    {{-- Cek apakah user login --}}
    @auth
      <div onclick="window.location.href='{{ route('profile.index') }}'" class="cursor-pointer bg-[#A54D4D] text-white rounded-full w-7 h-7 flex items-center justify-center font-semibold text-sm">
          {{-- Ambil inisial nama user atau ikon default --}}
          {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
      </div>
    @else
      {{-- Jika belum login, mungkin tampilkan tombol login/register --}}
      <a href="{{ route('login') }}" class="text-sm font-semibold">Login</a>
      {{-- <a href="{{ route('register') }}" class="text-sm font-semibold ml-2">Register</a> --}}
    @endauth
  </div>
</nav>

<!-- Banner -->
<section class="mt-6 px-6 md:px-12">
  {{-- Pastikan banner.png ada di public/banner.png --}}
  <img src="{{ asset('banner.png') }}" alt="Explore Sekarang" class="rounded-lg w-full object-cover">
</section>

<!-- Category -->
<section class="py-10 px-6 md:px-12">
  <div class="flex items-center gap-2 mb-2">
    {{-- Pastikan tag.png ada di public/tag.png --}}
    <img src="{{ asset('tag.png') }}" alt="icon" class="w-3 h-5" />
    <p class="text-sm font-medium text-[#9B3131]">Categories</p>
  </div>
  <h2 class="text-2xl font-bold text-[#521018] mb-8">Browse By Category</h2>
  {{-- Cek apakah variabel $categories ada dan tidak kosong --}}
  @if(isset($categories) && $categories->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      @foreach($categories as $category)
        <a href="{{ route('categories.show', $category->slug) }}">
          <div class="bg-[#F8F1E7] rounded-3xl py-8 flex flex-col items-center shadow-sm
                      transition-transform transform hover:-translate-y-1 hover:shadow-lg cursor-pointer">
              {{-- Asumsi $category->icon_filename berisi nama file ikon, misal "atasanc.svg" --}}
              {{-- dan file tersebut ada di public/ --}}
              <img src="{{ asset($category->icon_filename) }}" alt="{{ $category->name }}" class="w-12 h-12 mb-2" />
              <p class="font-medium text-primary">{{ $category->name }}</p>
          </div>
        </a>
      @endforeach
    </div>
  @else
    <p class="text-center text-gray-500">Belum ada kategori tersedia.</p>
  @endif
</section>

<!-- New Products -->
<section class="mt-12 px-6 md:px-12">
  <div class="flex items-center gap-2 mb-2">
    <img src="{{ asset('tag.png') }}" alt="icon" class="w-3 h-5" />
    <p class="text-sm font-medium text-[#9B3131]">New Products</p>
  </div>
  <h2 class="text-xl font-bold mt-2">Today's New Products</h2>
  {{-- Cek apakah variabel $newProducts ada dan tidak kosong --}}
  @if(isset($newProducts) && $newProducts->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-6">
      @foreach($newProducts as $product)
        <a href="{{ route('products.show', $product->slug) }}">
          <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
              {{-- Asumsi $product->main_image_filename berisi nama file gambar, misal "rokmini.png" --}}
              {{-- dan file tersebut ada di public/ --}}
              <img src="{{ asset($product->main_image_filename) }}" alt="{{ $product->name }}" class="w-full h-40 object-contain mb-2">
              <h4 class="text-sm font-medium">{{ $product->name }}</h4>
              <p class="text-[#A54D4D] text-sm font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
              {{-- Menampilkan atribut 'size' jika ada --}}
              @if(isset($product->attributes['size']))
                <p class="text-xs text-gray-500">{{ $product->attributes['size'] }}</p>
              @endif
          </div>
        </a>
      @endforeach
    </div>
  @else
    <p class="text-center text-gray-500">Belum ada produk baru hari ini.</p>
  @endif
</section>

<!-- Big Deals -->
<section class="mt-12 px-6 md:px-12">
  <div class="flex items-center gap-2 mb-2">
    <img src="{{ asset('tag.png') }}" alt="icon" class="w-3 h-5" />
    <p class="text-sm font-medium text-[#9B3131]">Big Deals</p>
  </div>
  <h2 class="text-xl font-bold mt-2">Special Price</h2>
  {{-- Cek apakah variabel $bigDealProducts ada dan tidak kosong --}}
  @if(isset($bigDealProducts) && $bigDealProducts->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-6">
      @foreach($bigDealProducts as $product)
        <a href="{{ route('products.show', $product->slug) }}">
          <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <img src="{{ asset($product->main_image_filename) }}" alt="{{ $product->name }}" class="w-full h-40 object-contain mb-2">
            <h4 class="text-sm font-medium">{{ $product->name }}</h4>
            <p class="text-[#A54D4D] text-sm font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}
              {{-- Tampilkan harga asli jika ada (untuk diskon) --}}
              @if($product->original_price)
                <span class="line-through text-gray-400 text-xs ml-2">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
              @endif
            </p>
          </div>
        </a>
      @endforeach
    </div>
  @else
    <p class="text-center text-gray-500">Tidak ada penawaran spesial saat ini.</p>
  @endif
</section>

<!-- Footer -->
<footer class="bg-[#521018] text-white py-20 px-6 mt-16">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
    <div>
      {{-- Pastikan footerlog.svg ada di public/footerlog.svg --}}
      <img src="{{ asset('footerlog.svg') }}" alt="Loopin Logo" class="h-6 mx-auto md:mx-0">
      <p class="text-sm mt-2">We help you find your fits!</p>
      <div class="flex justify-center md:justify-start space-x-8 mt-6 text-xl">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
    <div>
      <h3 class="font-semibold mb-2">Support</h3>
      <p class="text-sm">Darussalam, Kec. Syiah Kuala<br>Kota Banda Aceh, Aceh 23111</p>
      <p class="text-sm mt-2">loopin@gmail.com<br>+62 819 3748 1281</p>
    </div>
    <div>
      <h3 class="font-semibold mb-2">Kategori</h3>
      {{-- Kategori di footer juga bisa dinamis dari database --}}
      @if(isset($categories) && $categories->count() > 0)
        <ul class="text-sm space-y-1">
          @foreach($categories as $category)
            <li><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></li>
          @endforeach
        </ul>
      @else
        <ul class="text-sm space-y-1">
            <li>Atasan</li>
            <li>Bawahan</li>
            <li>Dress</li>
            <li>Sepatu</li>
        </ul>
      @endif
    </div>
  </div>
</footer>

</body>
</html>