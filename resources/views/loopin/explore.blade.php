<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Loopin - Explore Produk</title>
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
<body class="bg-white text-[#521018]">

  <!-- Navbar -->
  <nav class="bg-[#F8F1E7] flex items-center justify-between px-8 py-4 shadow-sm sticky top-0 z-50">
    <div class="flex-shrink-0">
      <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
    </div>
    <div class="flex space-x-20">
      <a href="{{ route('home') }}" class="text-black font-semibold hover:text-[#A54D4D]">Home</a>
      <a href="{{ route('products.explore') }}" class="text-white font-semibold bg-[#A54D4D] px-4 py-1 rounded-full">Explore</a>
      <a href="{{ route('categories.index') }}" class="text-black font-semibold hover:text-[#A54D4D]">Category</a>
    </div>
    <div class="flex items-center space-x-4">
        {{-- Search form --}}
        <form action="{{ route('products.explore') }}" method="GET" class="flex items-center">
            <input type="text" name="search" placeholder="Lagi Mau Cari Apa?" value="{{ request('search') }}" class="bg-white text-sm px-4 py-1.5 rounded-md shadow border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#A54D4D]">
            <button type="submit" class="ml-2 p-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#521018]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z" />
              </svg>
            </button>
        </form>
        <a href="{{ route('cart.index') }}" class="p-2 relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#521018]" viewBox="0 0 24 24" fill="currentColor">
            <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zM7.334 13l.94 2h8.412l3.264-7H6.25l-1-2H2v2h2l3.6 7.59L5.25 17h13v-2H7.334z"/>
            </svg>
            @if(Cart::getTotalQuantity() > 0)
              <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">{{ Cart::getTotalQuantity() }}</span>
            @endif
        </a>
        @auth
            <div onclick="window.location.href='{{ route('profile.index') }}'" class="cursor-pointer bg-[#A54D4D] text-white rounded-full w-7 h-7 flex items-center justify-center font-semibold text-sm">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        @else
            <a href="{{ route('login') }}" class="text-sm font-semibold">Login</a>
        @endauth
    </div>
  </nav>

  <!-- Explore Section -->
  <section class="max-w-6xl mx-auto px-4 py-10 md:py-16">
    <div class="flex items-center space-x-2 text-sm text-primary mb-2">
        <img src="{{ asset('tag.png') }}" alt="icon" class="w-3 h-5" />
      <span class="font-semibold">Explore</span>
    </div>
    <h2 class="text-3xl font-bold mb-8 text-[#521018]">Explore Semua Produk Kami</h2>

    {{-- Filter Section (Contoh) --}}
    <form method="GET" action="{{ route('products.explore') }}" class="mb-8 p-4 bg-gray-50 rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label for="search-filter" class="block text-sm font-medium text-gray-700">Cari Produk</label>
                <input type="text" name="search" id="search-filter" value="{{ request('search') }}" placeholder="Nama produk..." class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category_id" id="category_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="sort_by" class="block text-sm font-medium text-gray-700">Urutkan Berdasarkan</label>
                <select name="sort_by" id="sort_by" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="created_at" {{ request('sort_by', 'created_at') == 'created_at' ? 'selected' : '' }}>Terbaru</option>
                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nama (A-Z)</option>
                    <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Harga</option>
                </select>
            </div>
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700">Urutan</label>
                <select name="sort_order" id="sort_order" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="desc" {{ request('sort_order', 'desc') == 'desc' ? 'selected' : '' }}>Menurun (Z-A / Mahal)</option>
                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Menaik (A-Z / Murah)</option>
                </select>
            </div>
        </div>
        <div class="mt-4 text-right">
            <a href="{{ route('products.explore') }}" class="text-sm text-gray-600 hover:text-primary mr-4">Reset Filter</a>
            <button type="submit" class="bg-primary text-white font-medium px-6 py-2 rounded hover:bg-[#8d3f3f] transition">
                Terapkan Filter
            </button>
        </div>
    </form>


    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <a href="{{ route('products.show', $product->slug) }}" class="block group">
                <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md group-hover:shadow-lg transition-all duration-300 transform group-hover:-translate-y-1 h-full flex flex-col">
                <img src="{{ asset($product->main_image_filename ?? 'placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-40 sm:h-48 object-contain mb-3 rounded">
                <h4 class="text-sm font-medium text-gray-800 group-hover:text-primary truncate">{{ $product->name }}</h4>
                <p class="text-primary text-base font-bold mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                @if($product->original_price)
                    <p class="text-xs text-gray-500 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</p>
                @endif
                @if(isset($product->attributes['size']))
                    <p class="text-xs text-gray-500 mt-1">Ukuran: {{ is_array($product->attributes['size']) ? implode(', ', $product->attributes['size']) : $product->attributes['size'] }}</p>
                @endif
                <p class="text-xs text-gray-400 mt-auto pt-2">Kategori: {{ $product->category->name ?? 'Tidak ada kategori' }}</p>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-12">
            {{ $products->appends(request()->query())->links() }} {{-- appends() untuk menjaga query filter saat ganti halaman --}}
        </div>
    @else
        <div class="text-center py-10">
            <img src="{{ asset('no-results.svg') }}" alt="Tidak Ada Hasil" class="mx-auto mb-6 w-40 h-40"> {{-- Buat gambar no-results.svg --}}
            <p class="text-xl text-gray-600 mb-2">Oops! Produk tidak ditemukan.</p>
            <p class="text-gray-500 mb-6">Coba kata kunci lain atau reset filter pencarian Anda.</p>
            <a href="{{ route('products.explore') }}" class="bg-primary text-white font-semibold px-6 py-3 rounded-md hover:bg-[#8d3f3f]">
            Reset Filter & Kembali
            </a>
      </div>
    @endif
  </section>

  <!-- Footer (sama seperti sebelumnya) -->
    <footer class="bg-[#521018] text-white py-20 px-6 mt-16">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
          <div>
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
            {{-- Idealnya $categories juga dikirim ke footer jika belum ada --}}
            @if(isset($categories) && $categories->count() > 0)
                <ul class="text-sm space-y-1">
                @foreach($categories as $cat)
                    <li><a href="{{ route('categories.show', $cat->slug) }}">{{ $cat->name }}</a></li>
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
        <p class="text-center text-xs mt-10">© {{ date('Y') }} Loopin. All rights reserved.</p>
    </footer>

</body>
</html>