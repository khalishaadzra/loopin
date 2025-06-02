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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#A54D4D',
            secondary: '#E6D2AE',
            background: '#F9F3EB', 
          }
        }
      }
    }
  </script>
  <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-background text-dark"> 

<!-- Navbar -->
<nav class="bg-[#F8F1E7] flex items-center justify-between px-6 md:px-8 py-4 shadow-sm sticky top-0 z-50">
  <div class="flex-shrink-0">
    <a href="{{ route('home') }}">
      <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
    </a>
  </div>
  <div class="hidden md:flex space-x-12 lg:space-x-20">
    {{-- Link Home dengan style aktif --}}
    <a href="{{ route('home') }}" class="text-white font-semibold bg-primary px-4 py-1 rounded-full">Home</a>
    <a href="{{ route('products.explore') }}" class="text-dark font-semibold hover:text-primary transition-colors">Explore</a>
    <a href="{{ route('categories.index') }}" class="text-dark font-semibold hover:text-primary transition-colors">Category</a>
  </div>
  <div class="flex items-center space-x-3 md:space-x-4">
      <form action="{{ route('products.explore') }}" method="GET" class="hidden sm:flex items-center">
          <input type="text" name="search" placeholder="Lagi Mau Cari Apa?" value="{{ request('search') }}" class="bg-white text-sm px-3 py-1.5 rounded-md shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
          <button type="submit" class="ml-2 p-1 text-dark hover:text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z" /></svg>
          </button>
      </form>
      <a href="{{ route('cart.index') }}" class="p-2 relative text-dark hover:text-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zM7.334 13l.94 2h8.412l3.264-7H6.25l-1-2H2v2h2l3.6 7.59L5.25 17h13v-2H7.334z"/></svg>
          
          @if(Cart::getTotalQuantity() > 0)
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">{{ Cart::getTotalQuantity() }}</span>
          @endif
      </a>
      @auth
          <div data-url="{{ route('profile.index') }}" id="profileLinkNavbar" class="cursor-pointer bg-primary text-white rounded-full w-7 h-7 flex items-center justify-center font-semibold text-sm hover:bg-opacity-80 transition-colors">
          {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
      @else
          <a href="{{ route('login') }}" class="text-sm font-semibold text-dark hover:text-primary">Login</a>
      @endauth
      <div class="md:hidden">
          <button id="mobileMenuButton" class="text-dark focus:outline-none">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
          </button>
      </div>
  </div>
</nav>
<!-- Mobile Menu  -->
<div id="mobileMenu" class="hidden md:hidden bg-[#F8F1E7] shadow-lg py-2 fixed top-[68px] left-0 right-0 z-40">
    <a href="{{ route('home') }}" class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Home</a>
    <a href="{{ route('products.explore') }}" class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Explore</a>
    <a href="{{ route('categories.index') }}" class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Category</a>
    <form action="{{ route('products.explore') }}" method="GET" class="px-6 py-2 flex items-center border-t border-gray-200 mt-1 pt-3">
        <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}" class="w-full bg-white text-sm px-3 py-1.5 rounded-md shadow-sm border border-gray-300 focus:outline-none focus:ring-1 focus:ring-primary">
        <button type="submit" class="ml-2 p-1 text-dark hover:text-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z" /></svg>
        </button>
    </form>
</div>
<!-- End Navbar -->

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
              <img src="{{ asset($product->main_image_filename) }}" alt="{{ $product->name }}" class="w-full h-40 object-contain mb-2">
              <h4 class="text-sm font-medium">{{ $product->name }}</h4>
              <p class="text-[#A54D4D] text-sm font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
              
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