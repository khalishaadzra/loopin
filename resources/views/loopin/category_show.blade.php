<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name ?? 'Detail Kategori' }} - Loopin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
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
                dark: '#521018'
              }
            }
          }
        }
    </script>
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 text-dark">

    <!-- Navbar -->
    <nav class="bg-[#F8F1E7] flex items-center justify-between px-6 md:px-8 py-4 shadow-sm sticky top-0 z-50">
        <div class="flex-shrink-0">
          <a href="{{ route('home') }}">
            <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
          </a>
        </div>
        <div class="hidden md:flex space-x-12 lg:space-x-20">
          <a href="{{ route('home') }}" class="text-dark font-semibold hover:text-primary transition-colors">Home</a>
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
            <div data-url="{{ route('profile.index') }}" id="profileLinkDiv" class="cursor-pointer ...">
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
    <div id="mobileMenu" class="hidden md:hidden bg-[#F8F1E7] shadow-lg py-2">
        <a href="{{ route('home') }}" class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Home</a>
        <a href="{{ route('products.explore') }}" class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Explore</a>
        <a href="{{ route('categories.index') }}" class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Category</a>
        <form action="{{ route('products.explore') }}" method="GET" class="sm:hidden px-6 py-2 flex items-center">
            <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}" class="w-full bg-white text-sm px-3 py-1.5 rounded-md shadow-sm border border-gray-300 focus:outline-none focus:ring-1 focus:ring-primary">
            <button type="submit" class="ml-2 p-1 text-dark hover:text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z" /></svg>
            </button>
        </form>
    </div>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <div class="mb-6 md:mb-8">
            {{-- Breadcrumbs --}}
            <nav class="text-xs sm:text-sm mb-3 md:mb-4" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                  <li class="flex items-center">
                    <a href="{{ route('home') }}" class="text-primary hover:underline">Home</a>
                    <svg class="fill-current w-3 h-3 mx-1.5 md:mx-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                  </li>
                  <li class="flex items-center">
                    <a href="{{ route('categories.index') }}" class="text-primary hover:underline">Kategori</a>
                    <svg class="fill-current w-3 h-3 mx-1.5 md:mx-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                  </li>
                  <li class="text-gray-500" aria-current="page">
                    {{ $category->name ?? 'Kategori' }}
                  </li>
                </ol>
              </nav>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-dark flex items-center">
                @if($category->icon_filename)
                    <img src="{{ asset($category->icon_filename) }}" alt="Ikon {{ $category->name }}" class="w-8 h-8 mr-3 object-contain">
                @endif
                {{ $category->name ?? 'Nama Kategori' }}
            </h1>
            @if(isset($category->description) && $category->description)
                <p class="mt-2 text-sm sm:text-base text-gray-600">{{ $category->description }}</p>
            @endif
        </div>

        @if(isset($products) && $products->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($products as $product)
                    <a href="{{ route('products.show', $product->slug) }}" class="block group">
                        <div class="bg-white rounded-lg p-3 md:p-4 shadow-md group-hover:shadow-lg transition-all duration-300 transform group-hover:-translate-y-1 h-full flex flex-col">
                            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md mb-3">
                                <img src="{{ asset($product->main_image_filename ?? 'placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <h4 class="text-sm md:text-base font-medium text-gray-800 group-hover:text-primary truncate" title="{{ $product->name }}">{{ $product->name }}</h4>
                            <p class="text-primary text-base md:text-lg font-bold mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            @if($product->original_price)
                                <p class="text-xs text-gray-500 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</p>
                            @endif
                            @if(isset($product->attributes['size']))
                                <p class="text-xs text-gray-500 mt-1">
                                    {{-- Ukuran:  --}}
                                    {{ is_array($product->attributes['size']) ? implode(', ', $product->attributes['size']) : $product->attributes['size'] }}</p>
                            @endif
                            <form action="{{ route('cart.add') }}" method="POST" class="mt-auto pt-2 md:pt-3">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="w-full bg-primary text-white text-xs sm:text-sm font-medium py-2 px-3 rounded-md hover:bg-[#8d3f3f] transition
                                    @if($product->stock < 1) opacity-50 cursor-not-allowed @endif"
                                    @if($product->stock < 1) disabled @endif>
                                    @if($product->stock > 0) Tambah Keranjang @else Stok Habis @endif
                                </button>
                            </form>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-10 md:mt-12">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-10 bg-white rounded-lg shadow-md">
                <img src="{{ asset('no-results.svg') }}" alt="Tidak Ada Produk" class="mx-auto mb-6 w-32 h-32"> {{-- Pastikan gambar ini ada --}}
                <p class="text-xl text-gray-600">Belum ada produk dalam kategori <strong class="text-primary">{{ $category->name }}</strong>.</p>
                <p class="text-gray-500 mt-2">Silakan cek kategori lain atau kembali lagi nanti.</p>
                <a href="{{ route('categories.index') }}" class="inline-block mt-6 bg-primary text-white font-semibold px-6 py-2.5 rounded-md hover:bg-[#8d3f3f] transition">
                    Lihat Semua Kategori
                </a>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12 md:py-20 px-6 mt-10 md:mt-16">
      <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
        <div>
          <a href="{{ route('home') }}">
              <img src="{{ asset('footerlog.svg') }}" alt="Loopin Logo" class="h-6 mx-auto md:mx-0 mb-3">
          </a>
          <p class="text-sm text-gray-300">We help you find your fits!</p>
          <div class="flex justify-center md:justify-start space-x-6 mt-6 text-xl">
            <a href="#" class="text-gray-300 hover:text-white transition-colors"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-300 hover:text-white transition-colors"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-300 hover:text-white transition-colors"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
        <div>
          <h3 class="font-semibold text-lg mb-3 text-white">Dukungan</h3>
          <p class="text-sm text-gray-300">Darussalam, Kec. Syiah Kuala<br>Kota Banda Aceh, Aceh 23111</p>
          <p class="text-sm text-gray-300 mt-2">loopin@gmail.com<br>+62 819 3748 1281</p>
        </div>
        <div>
          <h3 class="font-semibold text-lg mb-3 text-white">Navigasi Cepat</h3>
         
          @php
              $footerCategories = \App\Models\Category::orderBy('name')->take(4)->get();
          @endphp
          @if($footerCategories->count() > 0)
              <ul class="text-sm space-y-1.5">
              @foreach($footerCategories as $footCat)
                  <li><a href="{{ route('categories.show', $footCat->slug) }}" class="text-gray-300 hover:text-white hover:underline transition-colors">{{ $footCat->name }}</a></li>
              @endforeach
              <li><a href="{{ route('products.explore') }}" class="text-gray-300 hover:text-white hover:underline transition-colors">Semua Produk</a></li>
              </ul>
          @else
              <ul class="text-sm space-y-1.5 text-gray-300">
              <li>Atasan</li><li>Bawahan</li><li>Dress</li><li>Sepatu</li>
              </ul>
          @endif
        </div>
      </div>
      <p class="text-center text-xs text-gray-400 mt-10 md:mt-12">© {{ date('Y') }} Loopin. All rights reserved.</p>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
        const profileLinkDiv = document.getElementById('profileLinkDiv');
            if (profileLinkDiv) {
                profileLinkDiv.addEventListener('click', function() {
                    window.location.href = this.dataset.url;
                    });
                }
            });
    </script>
</body>
</html>