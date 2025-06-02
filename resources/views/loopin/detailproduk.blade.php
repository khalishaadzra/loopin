<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name ?? 'Detail Produk' }} - Loopin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> {{-- Font Awesome untuk ikon --}}
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
    <style>
        body { font-family: 'Inter', sans-serif; }
        .thumbnail-active {
            border-color: #A54D4D; 
            border-width: 2px;
            box-shadow: 0 0 0 1px #A54D4D; 
        }
        /* Tambahan untuk aspect ratio jika tidak menggunakan plugin Tailwind */
        .aspect-w-1 { position: relative; padding-bottom: 100%; }
        .aspect-h-1 > * { position: absolute; height: 100%; width: 100%; top: 0; right: 0; bottom: 0; left: 0; }
    </style>
</head>
<body class="bg-white text-dark">

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
    <div id="mobileMenu" class="hidden md:hidden bg-[#F8F1E7] shadow-lg py-2 fixed top-[68px] left-0 right-0 z-40"> {{-- Sesuaikan top jika tinggi navbar berubah --}}
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

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow" role="alert">
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow" role="alert">
                <p class="font-medium">{{ session('error') }}</p>
            </div>
        @endif

        @if(isset($product))
            <nav class="text-xs sm:text-sm mb-4 md:mb-6" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex flex-wrap">
                  <li class="flex items-center">
                    <a href="{{ route('home') }}" class="text-primary hover:underline">Home</a>
                    <svg class="fill-current w-3 h-3 mx-1.5 md:mx-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                  </li>
                  @if($product->category)
                  <li class="flex items-center">
                    <a href="{{ route('categories.show', $product->category->slug) }}" class="text-primary hover:underline">{{ $product->category->name }}</a>
                    <svg class="fill-current w-3 h-3 mx-1.5 md:mx-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                  </li>
                  @endif
                  <li class="text-gray-500 truncate" aria-current="page" title="{{ $product->name }}">
                    {{ Str::limit($product->name, 30) }}
                  </li>
                </ol>
            </nav>

            <div class="flex flex-col lg:flex-row gap-8 md:gap-12">
              <!-- Images Section -->
              <div class="w-full lg:w-1/2 flex flex-col-reverse sm:flex-row gap-3 sm:gap-4">
                  <div id="thumbnailContainer" class="flex sm:flex-col space-x-2 sm:space-x-0 sm:space-y-3 overflow-x-auto sm:overflow-x-visible pb-2 sm:pb-0">
                    <img src="{{ asset($product->main_image_filename ?? 'placeholder.png') }}"
                         alt="Thumbnail Utama {{ $product->name }}"
                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-cover rounded-lg cursor-pointer border-2 hover:border-primary thumbnail-active" {{-- Thumbnail pertama aktif --}}
                         onclick="changeMainImage('{{ asset($product->main_image_filename ?? 'placeholder.png') }}', this)">

                    @if($product->images && $product->images->count() > 0)
                        @foreach($product->images as $image)
                            <img src="{{ asset($image->image_filename ?? 'placeholder.png') }}"
                                 alt="Thumbnail {{ $loop->iteration + 1 }} {{ $product->name }}"
                                 class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-primary"
                                 onclick="changeMainImage('{{ asset($image->image_filename ?? 'placeholder.png') }}', this)">
                        @endforeach
                    @endif
                  </div>
                  <div class="flex-1">
                    <img id="mainProductImage" src="{{ asset($product->main_image_filename ?? 'placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-auto max-h-[400px] md:max-h-[500px] object-contain rounded-xl border p-2 md:p-4 shadow-sm">
                  </div>
              </div>

              <!-- Product Info Section -->
              <div class="w-full lg:w-1/2 space-y-3 md:space-y-4">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-dark">{{ $product->name }}</h1>
                @if($product->category)
                    <p class="text-sm font-medium">
                        <a href="{{ route('categories.show', $product->category->slug) }}" class="text-primary hover:underline">Kategori: {{ $product->category->name }}</a>
                    </p>
                @endif
                <div class="flex items-baseline space-x-2">
                    <p class="text-2xl md:text-3xl font-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    @if($product->original_price && $product->original_price > $product->price)
                        <p class="text-lg text-gray-500 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</p>
                    @endif
                </div>

                <div class="text-sm text-gray-700 leading-relaxed prose max-w-none">
                  {!! nl2br(e($product->description)) !!}
                </div>
                <hr class="my-4 border-secondary">

                @if($product->attributes)
                    @if(isset($product->attributes['color']))
                    <div class="flex items-center">
                      <span class="font-semibold text-dark text-sm">Warna:</span>
                      <span class="ml-2 text-sm text-gray-700">{{ $product->attributes['color'] }}</span>
                    </div>
                    @endif
                    @if(isset($product->attributes['size']))
                    <div class="flex items-center">
                      <span class="font-semibold text-dark text-sm">Size:</span>
                      @if(is_array($product->attributes['size']))
                        @foreach($product->attributes['size'] as $s)
                         <span class="ml-2 border border-gray-400 text-gray-700 px-2 py-0.5 rounded text-xs">{{ $s }}</span>
                        @endforeach
                      @else
                         <span class="ml-2 border border-gray-400 text-gray-700 px-2 py-0.5 rounded text-xs">{{ $product->attributes['size'] }}</span>
                      @endif
                    </div>
                    @endif
                @endif
                <p class="text-sm font-medium {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                    Stok: {{ $product->stock > 0 ? $product->stock . ' tersedia' : 'Habis' }}
                </p>

                <!-- Action Buttons (Form Tambah ke Keranjang) -->
                <form action="{{ route('cart.add') }}" method="POST" class="pt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="flex items-center space-x-3 mb-4">
                        <label for="quantity" class="font-semibold text-dark text-sm">Jumlah:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock > 0 ? $product->stock : 1 }}"
                               class="w-20 border border-gray-300 rounded-md text-center p-2 focus:ring-primary focus:border-primary"
                               {{ $product->stock < 1 ? 'disabled' : '' }}>
                    </div>

                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                      <button type="submit" name="action" value="add_to_cart"
                              class="w-full sm:w-auto flex-grow bg-[#F8F1E7] text-dark font-semibold px-6 py-3 rounded-md hover:brightness-105 border border-gray-300 transition flex items-center justify-center {{ $product->stock < 1 ? 'opacity-50 cursor-not-allowed' : '' }}"
                              {{ $product->stock < 1 ? 'disabled' : '' }}>
                        @if($product->stock > 0)
                            <i class="fas fa-cart-plus mr-2"></i> Tambah ke Keranjang
                        @else
                            Stok Habis
                        @endif
                      </button>
                      <button type="submit" name="action" value="buy_now"
                              class="w-full sm:w-auto flex-grow bg-primary text-white font-semibold px-6 py-3 rounded-md hover:bg-opacity-80 transition flex items-center justify-center {{ $product->stock < 1 ? 'opacity-50 cursor-not-allowed' : '' }}"
                              {{ $product->stock < 1 ? 'disabled' : '' }}>
                        <i class="fas fa-shopping-bag mr-2"></i>
                        @if($product->stock > 0)
                            Beli Sekarang
                        @else
                            Stok Habis
                        @endif
                      </button>
                    </div>
                </form>
              </div>
            </div>

        @else
            <div class="text-center py-20">
                <img src="{{ asset('no-product.svg') }}" alt="Produk Tidak Ditemukan" class="mx-auto mb-6 w-40 h-40">
                <h2 class="text-2xl font-semibold text-gray-700">Produk tidak ditemukan.</h2>
                <p class="text-gray-500 mt-2">Mungkin produk yang Anda cari sudah tidak tersedia atau URL salah.</p>
                <a href="{{ route('products.explore') }}" class="inline-block mt-6 bg-primary text-white font-semibold px-6 py-3 rounded-md hover:bg-[#8d3f3f] transition">
                    Kembali ke Semua Produk
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
        // Fungsi untuk mengganti gambar utama saat thumbnail diklik
        function changeMainImage(newSrc, clickedThumbnail) {
            document.getElementById('mainProductImage').src = newSrc;
            const thumbnailContainer = document.getElementById('thumbnailContainer');
            if (thumbnailContainer) {
                thumbnailContainer.querySelectorAll('.cursor-pointer').forEach(img => {
                    img.classList.remove('thumbnail-active');
                    img.classList.add('border-transparent'); 
                });
            }
            if (clickedThumbnail) {
                clickedThumbnail.classList.add('thumbnail-active');
                clickedThumbnail.classList.remove('border-transparent');
            }
        }

        // Toggle mobile menu
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Tambahkan event listener untuk profileLinkNavbar jika menggunakan data-url
        const profileLinkNavbar = document.getElementById('profileLinkNavbar');
        if (profileLinkNavbar && profileLinkNavbar.dataset.url) {
            profileLinkNavbar.addEventListener('click', function() {
                window.location.href = this.dataset.url;
            });
        }
    </script>

</body>
</html>