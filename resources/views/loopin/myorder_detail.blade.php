<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rincian Pesanan {{ $order->order_number }} - Loopin</title>
    <link rel="icon" href="{{ asset('Group.png') }}" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 text-dark">

    <!-- Navbar -->
    <nav class="bg-[#F8F1E7] flex items-center justify-between px-6 md:px-8 py-4 shadow-sm sticky top-0 z-50">
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6" />
            </a>
        </div>
        <div class="hidden md:flex space-x-12 lg:space-x-20">
            <a href="{{ route('home') }}" class="text-dark font-semibold hover:text-primary transition-colors">Home</a>
            <a href="{{ route('products.explore') }}" class="text-dark font-semibold hover:text-primary transition-colors">Explore</a>
            <a href="{{ route('categories.index') }}" class="text-dark font-semibold hover:text-primary transition-colors">Category</a>
        </div>
        <div class="flex items-center space-x-3 md:space-x-4">
            <form action="{{ route('products.explore') }}" method="GET" class="hidden sm:flex items-center">
                <input
                    type="text"
                    name="search"
                    placeholder="Lagi Mau Cari Apa?"
                    value="{{ request('search') }}"
                    class="bg-white text-sm px-3 py-1.5 rounded-md shadow-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                />
                <button type="submit" class="ml-2 p-1 text-dark hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z" />
                    </svg>
                </button>
            </form>
            <a href="{{ route('cart.index') }}" class="p-2 relative text-dark hover:text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zM7.334 13l.94 2h8.412l3.264-7H6.25l-1-2H2v2h2l3.6 7.59L5.25 17h13v-2H7.334z" />
                </svg>
                @if(Cart::getTotalQuantity() > 0)
                <span
                    class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">{{ Cart::getTotalQuantity() }}</span>
                @endif
            </a>
            @auth
            <div data-url="{{ route('profile.index') }}" id="profileLinkNavbar"
                class="cursor-pointer bg-primary text-white rounded-full w-7 h-7 flex items-center justify-center font-semibold text-sm hover:bg-opacity-80 transition-colors">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            @else
            <a href="{{ route('login') }}" class="text-sm font-semibold text-dark hover:text-primary">Login</a>
            @endauth
            <div class="md:hidden">
                <button id="mobileMenuButton" class="text-dark focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-[#F8F1E7] shadow-lg py-2 fixed top-[68px] left-0 right-0 z-40">
        <a href="{{ route('home') }}" class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Home</a>
        <a href="{{ route('products.explore') }}"
            class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Explore</a>
        <a href="{{ route('categories.index') }}"
            class="block px-6 py-2 text-dark font-semibold hover:bg-primary hover:text-white">Category</a>
        <form action="{{ route('products.explore') }}" method="GET"
            class="px-6 py-2 flex items-center border-t border-gray-200 mt-1 pt-3">
            <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}"
                class="w-full bg-white text-sm px-3 py-1.5 rounded-md shadow-sm border border-gray-300 focus:outline-none focus:ring-1 focus:ring-primary" />
            <button type="submit" class="ml-2 p-1 text-dark hover:text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Main content -->
    <main class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center border-b pb-4 mb-6">
                <div>
                    <h1 class="text-2xl font-bold">Rincian Pesanan</h1>
                    <p class="text-sm text-gray-600">Kode Nomor: <span
                            class="font-semibold">{{ $order->order_number }}</span></p>
                    <p class="text-xs text-gray-500">Tanggal: {{ $order->created_at->translatedFormat('d F Y, H:i') }}</p>
                </div>
                <a href="{{ route('profile.orders') }}" class="text-sm text-blue-600 hover:underline">← Kembali ke Riwayat
                    Pesanan</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <h3 class="font-semibold text-lg mb-2">Informasi Pengiriman</h3>
                    <p><strong>Penerima:</strong> {{ $order->recipient_name }}</p>
                    <p><strong>Telepon:</strong> {{ $order->recipient_phone }}</p>
                    <p><strong>Alamat:</strong><br> {{ $order->shipping_address }}</p>
                    @if($order->shipping_address_detail)
                    <p><strong>Detail Alamat:</strong><br> {{ $order->shipping_address_detail }}</p>
                    @endif
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-2">Ringkasan Pembayaran</h3>
                    <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
                    <p><strong>Status Pembayaran:</strong>
                        <span
                            class="font-semibold {{ $order->payment_status == 'paid' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </p>
                    <p><strong>Total Pembayaran:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                </div>
            </div>

            <div>
                <h3 class="font-semibold text-lg mb-4">Daftar Produk</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-3 border-b border-gray-300">Produk</th>
                                <th class="py-2 px-3 border-b border-gray-300">Nama</th>
                                <th class="py-2 px-3 border-b border-gray-300">Harga</th>
                                <th class="py-2 px-3 border-b border-gray-300">Kuantitas</th>
                                <th class="py-2 px-3 border-b border-gray-300">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->Items as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="py-2 px-3">
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                                        class="w-20 h-20 object-cover rounded" />
                                </td>
                                <td class="py-2 px-3">{{ $item->product->name }}</td>
                                <td class="py-2 px-3">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="py-2 px-3">{{ $item->quantity }}</td>
                                <td class="py-2 px-3 font-semibold">Rp
                                    {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-6">
                <a href="{{ route('profile.orders') }}"
                    class="px-5 py-2 border border-primary text-primary rounded hover:bg-primary hover:text-white transition-colors">Kembali</a>
                @if($order->payment_status == 'pending')
                <a href="{{ route('orders.pay', $order->id) }}"
                    class="px-5 py-2 bg-primary text-white rounded hover:bg-primary-dark transition-colors">Bayar
                    Sekarang</a>
                @endif
            </div>
        </div>
    </main>

    <script>
        // Toggle mobile menu
        const mobileMenuBtn = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
