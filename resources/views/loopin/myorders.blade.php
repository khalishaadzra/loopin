<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan Saya - Loopin</title>
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

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <div class="bg-white shadow-lg rounded-xl p-6 md:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 pb-4 border-b border-gray-200">
                <h1 class="text-2xl md:text-3xl font-bold text-dark">Riwayat Pesanan Saya</h1>
                <a href="{{ route('profile.index') }}" class="text-sm text-primary hover:underline mt-2 sm:mt-0">← Kembali ke Profil</a>
            </div>

            @if($orders->count() > 0)
                <div class="space-y-6">
                    @foreach($orders as $order)
                        <div class="border border-gray-200 rounded-lg hover:shadow-md transition-shadow duration-200">
                            <div class="bg-gray-50 p-4 flex flex-col sm:flex-row justify-between sm:items-center rounded-t-lg">
                                <div>
                                    <p class="text-sm text-gray-600">Nomor Pesanan:
                                        <a href="{{ route('profile.orders.show', $order->id) }}" class="font-semibold text-primary hover:underline">{{ $order->order_number }}</a>
                                    </p>
                                    <p class="text-xs text-gray-500">Tanggal Pesan: {{ $order->created_at->translatedFormat('d F Y, H:i') }}</p>
                                </div>
                                {{-- Menampilkan status yang sudah disederhanakan --}}
                                <span class="mt-2 sm:mt-0 px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 self-start sm:self-center">
                                    {{ $order->status }} {{-- Akan menampilkan "Pesanan Diterima" --}}
                                </span>
                            </div>
                            <div class="p-4">
                                <div class="mb-3">
                                    <p class="text-sm font-medium text-gray-700 mb-1">Item:</p>
                                    @foreach($order->items->take(3) as $item) {{-- Tampilkan maks 3 item sebagai preview --}}
                                        <div class="flex items-center space-x-3 mb-1.5 text-sm">
                                            @if($item->product)
                                            <img src="{{ asset($item->product->main_image_filename ?? 'placeholder.png') }}" alt="{{ $item->product_name }}" class="w-10 h-10 object-cover rounded">
                                            @else
                                            <img src="{{ asset('placeholder.png') }}" alt="{{ $item->product_name }}" class="w-10 h-10 object-cover rounded">
                                            @endif
                                            <div>
                                                <p class="font-medium text-dark truncate" title="{{ $item->product_name }}">{{ Str::limit($item->product_name, 35) }}</p>
                                                <p class="text-xs text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if($order->items->count() > 3)
                                        <p class="text-xs text-gray-500 mt-1">+ {{ $order->items->count() - 3 }} item lainnya...</p>
                                    @endif
                                </div>
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-3 border-t border-gray-100">
                                    <div class="mb-2 sm:mb-0">
                                        <p class="text-sm text-gray-600">Metode Pembayaran: <span class="font-medium">{{ $order->payment_method }}</span></p>
                                        <p class="text-sm text-gray-600">Status Bayar: <span class="font-medium">{{ $order->payment_status }}</span></p>
                                    </div>
                                    <div class="text-left sm:text-right">
                                        <p class="text-gray-700 text-sm">Total Pesanan:</p>
                                        <p class="font-bold text-dark text-lg">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="mt-4 text-right">
                                    <a href="{{ route('profile.orders.show', $order->id) }}" class="text-sm bg-primary text-white px-5 py-2 rounded-md hover:bg-opacity-80 transition font-medium">
                                        Lihat Rincian & Nota
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $orders->links() }} {{-- Tampilkan link pagination --}}
                </div>
            @else
                <div class="text-center py-10">
                    <img src="{{ asset('no-orders.svg') }}" alt="Tidak Ada Pesanan" class="mx-auto mb-6 w-32 h-32"> {{-- Buat gambar no-orders.svg --}}
                    <p class="text-xl text-gray-600">Anda belum memiliki riwayat pesanan.</p>
                    <a href="{{ route('products.explore') }}" class="inline-block mt-6 bg-primary text-white font-semibold px-6 py-2.5 rounded-md hover:bg-[#8d3f3f] transition">
                        Mulai Belanja Sekarang
                    </a>
                </div>
            @endif
        </div>
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
    <!-- End Footer -->

    <script>
        // Skrip untuk menu mobile
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Skrip untuk profileLinkNavbar (jika menggunakan data-url)
        const profileLinkNavbar = document.getElementById('profileLinkNavbar');
        if (profileLinkNavbar && profileLinkNavbar.dataset.url) {
            profileLinkNavbar.addEventListener('click', function() {
                window.location.href = this.dataset.url;
            });
        }
    </script>
</body>
</html>