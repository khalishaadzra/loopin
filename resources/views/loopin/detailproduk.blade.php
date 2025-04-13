<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk - Loopin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-white text-[#521018]">

<!-- Navbar -->
   <nav class="bg-[#F8F1E7] flex items-center justify-between px-8 py-4 shadow-sm">
    <div class="flex-shrink-0">
      <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
    </div>
    <div class="flex space-x-20">
      <a href="/home" class="text-black font-semibold hover:text-[#A54D4D]">Home</a>
      <a href="/explore" class="text-black font-semibold hover:text-[#A54D4D]">Explore</a>
      <a href="/category" class="text-black font-semibold hover:text-[#A54D4D]">Category</a>
    </div>
    <div class="flex items-center space-x-4">
      <input type="text" placeholder="Lagi Mau Cari Apa?" class="bg-white text-sm px-4 py-1.5 rounded-md shadow border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#A54D4D]">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#521018]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#521018]" viewBox="0 0 24 24" fill="currentColor">
        <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 
        0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zM7.334 13l.94 2h8.412l3.264-7H6.25l-1-2H2v2h2l3.6 
        7.59L5.25 17h13v-2H7.334z"/>
      </svg>
      <div class="bg-[#A54D4D] text-white rounded-full w-7 h-7 flex items-center justify-center font-semibold text-sm">👤</div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-12 py-10">
    <h1 class="text-3xl font-bold mb-8">Detail Produk</h1>

    <div class="flex space-x-12">
      <!-- Thumbnail Images -->
      <div class="flex flex-col space-y-4">
        <img src="{{ asset('Belakang.jpeg') }}" alt="Gambar 1" class="w-24 rounded-lg">
        <img src="{{ asset('Atas.jpeg') }}" alt="Gambar 2" class="w-24 rounded-lg">
        <img src="{{ asset('Samping.jpeg') }}" alt="Gambar 3" class="w-24 rounded-lg">
        <img src="{{ asset('Bawah.jpeg') }}" alt="Gambar 4" class="w-24 rounded-lg">
      </div>

      <!-- Main Image -->
      <div class="flex-1">
        <img src="{{ asset('Sepatu Hitam Putih.jpeg') }}" alt="Produk" class="w-full max-w-xl rounded-2xl border p-4">
      </div>

      <!-- Product Info -->
      <div class="flex-1 space-y-4">
        <h2 class="text-2xl font-bold text-black">Sepatu Hitam Putih</h2>
        <p class="text-[#A54D4D] font-semibold">Sepatu</p>
        <p class="text-xl font-medium text-black">Rp 68.000</p>
        <p class="text-sm text-[#521018] leading-relaxed">
          Sepatu kasual unisex dengan desain simpel dan klasik, cocok untuk segala gaya. Terbuat dari bahan kanvas berkualitas dan sol karet yang empuk, nyaman dipakai untuk aktivitas harian.
        </p>
        <hr class="my-4 border-[#E6D2AE]">
        <div>
          <span class="font-semibold text-black">Warna:</span>
          <span class="ml-2">Hitam Putih</span>
        </div>
        <div>
          <span class="font-semibold text-black">Size:</span>
          <span class="ml-2 border border-black px-2 py-0.5 rounded text-sm">42</span>
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-4 pt-4">
          <button class="bg-[#F8F1E7] text-[#521018] font-semibold px-6 py-2 rounded hover:brightness-110">Keranjang</button>
          <button class="bg-[#A54D4D] text-white font-semibold px-6 py-2 rounded hover:bg-[#8d3f3f]">Beli Sekarang</button>
        </div>
      </div>
    </div>
  </main>

</body>
</html>
