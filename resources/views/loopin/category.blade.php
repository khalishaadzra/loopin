<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Loopin - Kategori Produk</title>
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
  <style>
    body { font-family: 'Inter', sans-serif; }
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="bg-white text-[#521018]">

  <!-- Navbar -->
  <nav class="bg-[#F8F1E7] flex items-center justify-between px-8 py-4 shadow-sm sticky top-0 z-50">
    <div class="flex-shrink-0">
      <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
    </div>
    <div class="flex space-x-20">
      <a href="{{ route('home') }}" class="text-black font-semibold hover:text-[#A54D4D]">Home</a>
      <a href="{{ route('products.explore') }}" class="text-black font-semibold hover:text-[#A54D4D]">Explore</a>
      <a href="{{ route('categories.index') }}" class="text-white font-semibold bg-[#A54D4D] px-4 py-1 rounded-full">Category</a>
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
            {{-- Idealnya $cartItemCount dikirim juga ke view ini dari AppServiceProvider atau base controller --}}
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

  <main class="p-6 md:p-10 lg:p-20 space-y-10">
    @if(isset($categoriesWithProducts) && $categoriesWithProducts->count() > 0)
        @foreach($categoriesWithProducts as $category)
        <section class="space-y-4">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <img src="{{ asset('tag.png') }}" alt="Tag" class="w-3 h-5">
                <h2 class="text-xl font-semibold text-[#451515]">{{ $category->name }}</h2>
              </div>
              {{-- Tombol scroll bisa ditambahkan jika item banyak dan overflow --}}
              {{-- <div class="flex space-x-2">
                <button onclick="scrollHorizontal('{{ $category->slug }}', -300)" class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center">
                    <img src="{{ asset('arrowl.svg') }}" alt="Left" class="w-4 h-4">
                </button>
                <button onclick="scrollHorizontal('{{ $category->slug }}', 300)" class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center">
                    <img src="{{ asset('arrowr.svg') }}" alt="Right" class="w-4 h-4">
                </button>
              </div> --}}
              <a href="{{ route('categories.show', $category->slug) }}" class="text-xs sm:text-sm text-primary hover:underline font-medium">
                Lihat Semua di {{ $category->name }} →
            </a>
            </div>

            @if($category->products->count() > 0)
            <div id="{{ $category->slug }}" class="hide-scrollbar flex space-x-4 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4">
              @foreach($category->products as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="snap-start shrink-0 w-60 md:w-64">
                    <div class="bg-[#F8F1E7] rounded-2xl border overflow-hidden shadow-sm hover:shadow-lg transition h-full flex flex-col">
                    <img src="{{ asset($product->main_image_filename ?? 'placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-40 md:h-48 object-cover">
                    <div class="p-3 md:p-4 flex flex-col flex-grow">
                        <h3 class="text-sm md:text-base font-medium text-[#451515] mb-1 truncate">{{ $product->name }}</h3>
                        @if(isset($product->attributes['size']))
                        <p class="text-xs text-gray-500 mb-1">Ukuran: {{ is_array($product->attributes['size']) ? implode(', ', $product->attributes['size']) : $product->attributes['size'] }}</p>
                        @endif
                        <p class="text-[#A54D4D] font-semibold mt-auto">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                    </div>
                </a>
              @endforeach
            </div>
            @else
            <p class="text-gray-500">Tidak ada produk dalam kategori ini.</p>
            @endif
        </section>
        @endforeach
    @else
        <p class="text-center text-xl text-gray-600">Tidak ada kategori tersedia.</p>
    @endif
  </main>

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
        @if(isset($categoriesWithProducts) && $categoriesWithProducts->count() > 0)
            <ul class="text-sm space-y-1">
            @foreach($categoriesWithProducts as $category)
                <li><a href="{{ route('categories.show', $category->slug) }}" class="text-xs sm:text-sm text-primary hover:underline font-medium">
                  Lihat Semua di {{ $category->name }} →
              </a></li>
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

  <script>
   
    const container = document.getElementById('categories');
  
    Object.entries(categories).forEach(([kategori, items]) => {
      const slug = kategori.toLowerCase().replace(/\s+/g, '-');
      const section = document.createElement('section');
      section.classList.add('space-y-4');
  
      section.innerHTML = `
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-2">
            <img src="/tag.png" alt="Tag" class="w-3 h-5">
            <h2 class="text-xl font-semibold text-[#451515]">${kategori}</h2>
          </div>
          <div class="flex space-x-2">
            <button onclick="scrollLeft('${slug}')" class="w-8 h-8 bg-[#A54D4D]-100 hover:bg-grey-200 rounded-full flex items-center justify-center">
              <img src="/arrowl.svg" alt="Left" class="w-4 h-4 transform rotate-360">
              <img src="/arrowl.svg" alt="Right" class="w-4 h-4 transform rotate-180">
            </button>
          </div>
        </div>
        <div id="${slug}" class="hide-scrollbar flex space-x-4 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4">
          ${items.map(item => `
            <div class="snap-start shrink-0 w-64 bg-[#F8F1E7] rounded-2xl border overflow-hidden shadow-sm hover:shadow-md transition">
              <img src="${item.image}" alt="${item.name}" class="w-full h-48 object-cover">
              <div class="p-4">
                <h3 class="text-base font-medium text-[#451515]">${item.name}</h3>
                <p class="text-sm text-gray-500">Ukuran: ${item.size}</p>
                <p class="text-[#A54D4D] font-semibold mt-1">Rp${item.price.toLocaleString('id-ID')}</p>
              </div>
            </div>
          `).join('')}
        </div>
      `;
      container.appendChild(section);
    });
  
    function scrollLeft(id) {
      const container = document.getElementById(id);
      container.scrollBy({ left: -300, behavior: 'smooth' });
    }
  
    function scrollRight(id) {
      const container = document.getElementById(id);
      container.scrollBy({ left: 300, behavior: 'smooth' });
    }
  </script>
</body>
</html>
  
 
  
