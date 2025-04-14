<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang - Loopin</title>
  <link rel="icon" type="image/x-icon" href="/Group.png">
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
      <a href="/keranjang" class="p-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#521018]" viewBox="0 0 24 24" fill="currentColor">
          <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 
          0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zM7.334 13l.94 2h8.412l3.264-7H6.25l-1-2H2v2h2l3.6 
          7.59L5.25 17h13v-2H7.334z"/>
        </svg>
      </a>
      <div onclick="window.location.href='/myprofile'" class="cursor-pointer bg-[#A54D4D] text-white rounded-full w-7 h-7 flex items-center justify-center font-semibold text-sm">
        👤
    </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-[#521018] mb-8">Keranjang</h1>

    <!-- List Produk -->
    <div class="space-y-6">
      
      <!-- Item 1 -->
      <div class="flex items-center justify-between bg-white shadow rounded-xl p-4">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('Sepatu Hitam Putih.jpeg') }}" alt="Sepatu Hitam Putih" class="w-14 h-14 object-cover">
          <span class="text-[#521018] font-medium">Sepatu Hitam Putih</span>
        </div>
        <div class="flex items-center">
          <div class="flex items-center space-x-6">
            <span class="text-[#521018] font-semibold">Rp 68.000</span>
            <button onclick="window.location.href='/checkout'" class="bg-[#A54D4D] text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-[#8d3f3f]">
                Checkout 1 item
              </button>
          </div>
          <button class="ml-4">
            <svg class="w-5 h-5 text-[#A54D4D] hover:text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 
                0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Item 2 -->
      <div class="flex items-center justify-between bg-white shadow rounded-xl p-4">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('Sepatu Sekolah.png') }}" alt="Sepatu Sekolah" class="w-14 h-14 object-cover">
          <span class="text-[#521018] font-medium">Sepatu Sekolah</span>
        </div>
        <div class="flex items-center">
          <div class="flex items-center space-x-6">
            <span class="text-[#521018] font-semibold">Rp 76.000</span>
            <button class="bg-[#A54D4D] text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-[#8d3f3f]">Checkout 1 item</button>
          </div>
          <button class="ml-4">
            <svg class="w-5 h-5 text-[#A54D4D] hover:text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 
                0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Item 3 -->
      <div class="flex items-center justify-between bg-white shadow rounded-xl p-4">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('Blouse Putih.png') }}" alt="Blouse Putih Strip" class="w-14 h-14 object-cover">
          <span class="text-[#521018] font-medium">Blouse Putih Strip</span>
        </div>
        <div class="flex items-center">
          <div class="flex items-center space-x-6">
            <span class="text-[#521018] font-semibold">Rp 50.000</span>
            <button class="bg-[#A54D4D] text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-[#8d3f3f]">Checkout 1 item</button>
          </div>
          <button class="ml-4">
            <svg class="w-5 h-5 text-[#A54D4D] hover:text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 
                0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Checkout All Button -->
    <div class="mt-10 flex justify-end pr-12">
        <a href="/checkout">
          <button class="bg-[#A54D4D] text-white font-semibold text-base px-6 py-2.5 rounded-md hover:bg-[#8d3f3f]">
            Checkout All
          </button>
        </a>
      </div>    
  </main>

</body>
</html>
