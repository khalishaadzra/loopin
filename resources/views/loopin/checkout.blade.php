<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout - Loopin</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-white text-[#521018]">

  <!-- Navbar -->
  <nav class="bg-[#F8F1E7] flex items-center justify-between px-8 py-4 shadow-sm sticky top-0 z-40">
    <div class="flex-shrink-0">
      <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
    </div>
    <div class="flex space-x-20">
      <a href="{{ route('home') }}" class="text-black font-semibold hover:text-[#A54D4D]">Home</a>
      <a href="{{ route('products.explore') }}" class="text-black font-semibold hover:text-[#A54D4D]">Explore</a>
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

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto p-6 md:p-8 flex flex-col lg:flex-row gap-8 md:gap-12 bg-white mt-6 md:mt-10 rounded-2xl shadow-lg">
    <!-- Left Form -->
    <div class="w-full lg:w-3/5">
      <h1 class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 text-dark">Detail Pengiriman</h1>
        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p class="font-bold">Error</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p class="font-bold">Harap perbaiki error berikut:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <form action="{{ route('checkout.process') }}" method="POST" class="space-y-5" id="checkoutForm">
        @csrf
        <div>
          <label for="nama_penerima" class="block text-sm font-medium text-gray-700 mb-1">Nama Penerima</label>
          <input type="text" name="nama_penerima" id="nama_penerima" value="{{ old('nama_penerima', $user->name ?? '') }}" required class="w-full bg-[#F5F5F5] p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary border border-transparent focus:border-primary placeholder-gray-400" placeholder="Masukkan nama lengkap penerima" />
        </div>
        <div>
          <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
          <input type="tel" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $user->phone ?? '') }}" required class="w-full bg-[#F5F5F5] p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary border border-transparent focus:border-primary placeholder-gray-400" placeholder="Contoh: 081234567890" />
        </div>
        <div>
          <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
          <textarea name="alamat_lengkap" id="alamat_lengkap" rows="3" required class="w-full bg-[#F5F5F5] p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary border border-transparent focus:border-primary placeholder-gray-400" placeholder="Jalan, nomor rumah, RT/RW, kelurahan, kecamatan">{{ old('alamat_lengkap', $user->address ?? '') }}</textarea>
        </div>
        <div>
          <label for="detail_alamat" class="block text-sm font-medium text-gray-700 mb-1">Detail Alamat (Opsional)</label>
          <input type="text" name="detail_alamat" id="detail_alamat" value="{{ old('detail_alamat') }}" class="w-full bg-[#F5F5F5] p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary border border-transparent focus:border-primary placeholder-gray-400" placeholder="Contoh: Blok C No. 5, Patokan dekat masjid" />
        </div>
    </div>

    <!-- Right Summary -->
    <div class="w-full lg:w-2/5 bg-[#F8F1E7] p-6 rounded-xl">
      <h2 class="text-xl font-semibold mb-6 text-dark">Ringkasan Pesanan</h2>
      @if(isset($cartItems) && $cartItems->count() > 0)
        <div class="space-y-3 mb-6 max-h-60 overflow-y-auto pr-2">
            @foreach($cartItems as $item)
            <div class="flex items-center gap-3">
                <img src="{{ asset($item->attributes->image_filename ?? 'placeholder.png') }}" alt="{{ $item->name }}" class="w-12 h-12 object-cover rounded-md" />
                <div class="flex-grow">
                <p class="text-sm font-medium text-dark truncate">{{ $item->name }}</p>
                <p class="text-xs text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
                <p class="text-sm text-dark font-semibold">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
            </div>
            @endforeach
        </div>
      @else
        <p class="text-center text-gray-500 mb-6">Keranjang Anda kosong.</p>
      @endif

      <div class="space-y-2 text-sm border-t border-secondary pt-4">
        <div class="flex justify-between">
          <span class="text-gray-600">Subtotal:</span>
          <span class="font-medium text-dark">Rp {{ number_format($subtotal ?? 0, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Biaya Pengiriman:</span>
          <span class="font-medium text-dark">Rp {{ number_format($shippingCost ?? 0, 0, ',', '.') }}</span>
        </div>
        <hr class="my-3 border-secondary" />
        <div class="flex justify-between font-bold text-lg text-dark">
          <span>Total Pembayaran:</span>
          <span>Rp {{ number_format($grandTotal ?? 0, 0, ',', '.') }}</span>
        </div>
      </div>

      <!-- Payment Method -->
      <div class="mt-6">
        <h3 class="text-md font-semibold mb-2 text-dark">Metode Pembayaran</h3>
        <label class="inline-flex items-center p-3 bg-white rounded-lg border border-primary w-full cursor-pointer">
          <input type="radio" name="payment_method" value="cod" checked class="form-radio h-4 w-4 text-primary focus:ring-primary mr-2" />
          <span class="text-dark font-medium">Cash on Delivery (Bayar di Tempat)</span>
        </label>
        
      </div>

      <button type="submit" form="checkoutForm"
        class="bg-primary text-white w-full mt-8 py-3 rounded-lg text-lg font-semibold hover:bg-[#8d3f3f] transition inline-block text-center
               {{ (!isset($cartItems) || $cartItems->isEmpty()) ? 'opacity-50 cursor-not-allowed' : '' }}"
        {{ (!isset($cartItems) || $cartItems->isEmpty()) ? 'disabled' : '' }}>
        Pesan Sekarang 
      </button>

    </form> 
    </div>
  </div>

</body>
</html>