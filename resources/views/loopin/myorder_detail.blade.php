<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rincian Pesanan {{ $order->order_number }} - Loopin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}" />
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
<body class="bg-grey-200 text-dark"> 

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

    <!-- Main content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <div class="bg-white shadow-xl rounded-xl p-6 md:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 pb-4 border-b border-gray-200">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-dark">Rincian Pesanan</h1>
                    <p class="text-sm text-gray-600 mt-1">Kode Nomor: <span class="font-semibold text-primary">{{ $order->order_number }}</span></p>
                    <p class="text-xs text-gray-500">Tanggal: {{ $order->created_at->translatedFormat('d F Y, H:i') }}</p>
                </div>
                <a href="{{ route('profile.orders') }}" class="text-sm text-primary hover:underline mt-3 sm:mt-0">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Riwayat Pesanan
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-8">
                <div>
                    <h3 class="font-semibold text-lg text-dark mb-3">Informasi Pengiriman</h3>
                    <div class="space-y-1 text-sm text-gray-700 leading-relaxed">
                        <p><strong>Penerima:</strong> {{ $order->recipient_name }}</p>
                        <p><strong>Telepon:</strong> {{ $order->recipient_phone }}</p>
                        <div>
                            <p class="font-semibold">Alamat:</p>
                            <p>{{ $order->shipping_address }}</p>
                        </div>
                        @if($order->shipping_address_detail)
                        <div>
                            <p class="font-semibold">Detail Alamat (Catatan):</p>
                            <p>{{ $order->shipping_address_detail }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-lg text-dark mb-3">Ringkasan Pembayaran</h3>
                    <div class="space-y-1 text-sm text-gray-700 leading-relaxed">
                        <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
                        <p><strong>Status Pembayaran:</strong>
                            <span class="font-semibold {{ $order->payment_status == 'paid' ? 'text-green-600' : ($order->payment_status == 'pending' ? 'text-yellow-600' : 'text-red-600') }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </p>
                        <p class="mt-2"><strong>Total Pembayaran:</strong></p>
                        <p class="text-xl font-bold text-primary">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="font-semibold text-lg text-dark mb-4">Daftar Produk Dipesan</h3>
                <div class="overflow-x-auto border border-gray-200 rounded-lg">
                    <table class="w-full min-w-max text-left">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="py-3 px-4 text-xs text-gray-500 uppercase tracking-wider font-semibold">Produk</th>
                                <th class="py-3 px-4 text-xs text-gray-500 uppercase tracking-wider font-semibold">Harga Satuan</th>
                                <th class="py-3 px-4 text-xs text-gray-500 uppercase tracking-wider font-semibold text-center">Kuantitas</th>
                                <th class="py-3 px-4 text-xs text-gray-500 uppercase tracking-wider font-semibold text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($order->Items as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-3">
                                        @if($item->product)
                                            <img src="{{ asset('storage/' . $item->product->main_image_filename) }}"
                                                 alt="{{ $item->product->name }}"
                                                 class="w-16 h-16 object-cover rounded-md shadow-sm"
                                                 onerror="this.onerror=null;this.src='{{ asset('placeholder.png') }}';" />
                                        @else
                                            <img src="{{ asset('placeholder.png') }}"
                                                 alt="Produk tidak tersedia"
                                                 class="w-16 h-16 object-cover rounded-md shadow-sm" />
                                        @endif
                                        <div>
                                            <p class="text-sm font-medium text-dark">{{ $item->product->name ?? $item->product_name ?? 'Nama Produk Tidak Tersedia' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm text-gray-700 whitespace-nowrap">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700 whitespace-nowrap text-center">{{ $item->quantity }}</td>
                                <td class="py-3 px-4 text-sm font-semibold text-dark whitespace-nowrap text-right">
                                    Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-6 px-4 text-center text-gray-500">
                                    Tidak ada item dalam pesanan ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-end items-center space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('profile.orders') }}"
                    class="w-full sm:w-auto px-6 py-2.5 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition text-sm font-medium text-center">
                    Kembali ke Riwayat
                </a>
                @if($order->payment_status == 'pending')
                <a href="{{ route('orders.pay', $order->id) }}"
                    class="w-full sm:w-auto px-6 py-2.5 bg-primary text-white rounded-md hover:bg-opacity-80 transition text-sm font-medium text-center">
                    Bayar Sekarang
                </a>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer (Sama seperti di myorder.blade.php) -->
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
                // Pastikan Model Category ada dan di-namespace dengan benar
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