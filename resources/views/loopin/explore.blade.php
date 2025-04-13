<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Loopin - Explore</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
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
</head>
<body class="bg-white text-[#521018]">

  <!-- Navbar -->
  <nav class="bg-[#F8F1E7] flex items-center justify-between px-8 py-4 shadow-sm">
    <div class="flex-shrink-0">
      <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
    </div>
    <div class="flex space-x-20">
      <a href="/home" class="text-black font-semibold hover:text-[#A54D4D]">Home</a>
      <a href="/explore" class="text-white font-semibold bg-[#A54D4D] px-4 py-1 rounded-full">Explore</a>
      <a href="/category" class="text-black font-semibold hover:text-[#A54D4D]">Category</a>
    </div>
    <div class="flex items-center space-x-4">
      <input type="text" placeholder="Lagi Mau Cari Apa?" class="bg-white text-sm px-4 py-1.5 rounded-md shadow border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#A54D4D]">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#521018]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1118 10.5a7.48 7.48 0 01-1.35 6.15z"/>
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

  <!-- Explore Section -->
  <section class="max-w-6xl mx-auto px-4 py-16">
    <div class="flex items-center space-x-2 text-sm text-[#A54D4D] mb-2">
        <img src="tag.png" alt="icon" class="w-3 h-5" />
      <span class="font-semibold">Explore</span>
    </div>
    <h2 class="text-3xl font-bold mb-8 text-[#521018]">Explore Our Products</h2>

<!-- Product Grid -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    <!-- Produk awal -->
    <div id="initial-products" class="contents">
        <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
        <img src="{{ asset('kemeja.png') }}" alt="Kemeja" class="w-full h-40 object-contain mb-2">
        <h4 class="text-sm font-medium">Kemeja Lengan Panjang Pria</h4>
        <p class="text-[#A54D4D] text-sm font-bold">Rp 55.000</p>
        <p class="text-xs text-gray-500">XL</p>
        </div>
  
        <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
        <img src="{{ asset('kaos.png') }}" alt="Kaos" class="w-full h-40 object-contain mb-2">
        <h4 class="text-sm font-medium">Kaos Pria</h4>
        <p class="text-[#A54D4D] text-sm font-bold">Rp 65.000</p>
        <p class="text-xs text-gray-500">L</p>
        </div>
  
        <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
        <img src="{{ asset('jogger.png') }}" alt="Celana Jogger" class="w-full h-40 object-contain mb-2">
        <h4 class="text-sm font-medium">Celana Jogger</h4>
        <p class="text-[#A54D4D] text-sm font-bold">Rp 33.000</p>
        <p class="text-xs text-gray-500">M</p>
        </div>
  
        <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
        <img src="{{ asset('cutbray.png') }}" alt="Cutbray" class="w-full h-40 object-contain mb-2">
        <h4 class="text-sm font-medium">Celana Cutbray</h4>
        <p class="text-[#A54D4D] text-sm font-bold">Rp 39.000</p>
        <p class="text-xs text-gray-500">S</p>
        </div>

        <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
        <img src="{{ asset('gamis.png') }}" alt="Gamis" class="w-full h-40 object-contain mb-2">
        <h4 class="text-sm font-medium">Gamis Wanita</h4>
        <p class="text-[#A54D4D] text-sm font-bold">Rp 70.000</p>
        <p class="text-xs text-gray-500">XL</p>
        </div>

        <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <img src="{{ asset('oneset.png') }}" alt="oneset" class="w-full h-40 object-contain mb-2">
            <h4 class="text-sm font-medium">One Set Kemeja & Rok Mini</h4>
            <p class="text-[#A54D4D] text-sm font-bold">Rp 79.000</p>
            <p class="text-xs text-gray-500">S</p>
        </div>

        <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <img src="{{ asset('sneakers.jpg') }}" alt="sneakers" class="w-full h-40 object-contain mb-2">
            <h4 class="text-sm font-medium">Sneakers</h4>
            <p class="text-[#A54D4D] text-sm font-bold">Rp 85.000</p>
            <p class="text-xs text-gray-500">40</p>
        </div>

        <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <img src="{{ asset('pantofel.png') }}" alt="pantofel" class="w-full h-40 object-contain mb-2">
            <h4 class="text-sm font-medium">Heels Pantofel</h4>
            <p class="text-[#A54D4D] text-sm font-bold">Rp 95.000</p>
            <p class="text-xs text-gray-500">38</p>
        </div>
      
    </div>
  
    <!-- Produk tambahan (disembunyikan awalnya) -->
    <div id="more-products" class="contents hidden">
 
    <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
      <img src="{{ asset('Jaket Hoodie.jpg') }}" alt="Jaket Hoodie" class="w-full h-40 object-contain mb-2">
      <h4 class="text-sm font-medium">Jaket Hoodie Pria</h4>
      <p class="text-[#A54D4D] text-sm font-bold">Rp 85.000</p>
      <p class="text-xs text-gray-500">L</p>
    </div>
  
    <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
      <img src="{{ asset('Rok Plisket.jpg') }}" alt="Rok Plisket" class="w-full h-40 object-contain mb-2">
      <h4 class="text-sm font-medium">Rok Plisket Wanita</h4>
      <p class="text-[#A54D4D] text-sm font-bold">Rp 35.000</p>
      <p class="text-xs text-gray-500">M</p>
    </div>
  
    <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
      <img src="{{ asset('Cardigan Rajut.jpg') }}" alt="Cardigan Rajut" class="w-full h-40 object-contain mb-2">
      <h4 class="text-sm font-medium">Cardigan Rajut</h4>
      <p class="text-[#A54D4D] text-sm font-bold">Rp 52.000</p>
      <p class="text-xs text-gray-500">S</p>
    </div>
  
    <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
      <img src="{{ asset('Celana Jeans.jpg') }}" alt="Celana Jeans" class="w-full h-40 object-contain mb-2">
      <h4 class="text-sm font-medium">Celana Jeans Slim Fit</h4>
      <p class="text-[#A54D4D] text-sm font-bold">Rp 67.000</p>
      <p class="text-xs text-gray-500">XL</p>
    </div>
  
    <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
      <img src="{{ asset('Blazer Formal Wanita.jpg') }}" alt="Blazer Formal Wanita" class="w-full h-40 object-contain mb-2">
      <h4 class="text-sm font-medium">Blazer Formal Wanita</h4>
      <p class="text-[#A54D4D] text-sm font-bold">Rp 89.000</p>
      <p class="text-xs text-gray-500">M</p>
    </div>
  
    <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
      <img src="{{ asset('Sweater.jpg') }}" alt="Sweater" class="w-full h-40 object-contain mb-2">
      <h4 class="text-sm font-medium">Sweater Polos Unisex</h4>
      <p class="text-[#A54D4D] text-sm font-bold">Rp 60.000</p>
      <p class="text-xs text-gray-500">L</p>
    </div>
  
    <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
      <img src="{{ asset('Dress Mini.jpg') }}" alt="Dress" class="w-full h-40 object-contain mb-2">
      <h4 class="text-sm font-medium">Mini Dress</h4>
      <p class="text-[#A54D4D] text-sm font-bold">Rp 88.000</p>
      <p class="text-xs text-gray-500">S</p>
    </div>
  
    <div class="bg-[#F8F1E7] rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1">
      <img src="{{ asset('Baju Training Sport.jpg') }}" alt="Baju Training Sport" class="w-full h-40 object-contain mb-2">
      <h4 class="text-sm font-medium">Baju Training Sport</h4>
      <p class="text-[#A54D4D] text-sm font-bold">Rp 76.000</p>
      <p class="text-xs text-gray-500">XL</p>
    </div>
  </div>
  
    </div>
  </div>
  
  <!-- Tombol View All -->
  <div class="text-center mt-10">
    <button id="view-btn" onclick="showProducts()" class="bg-[#A54D4D] text-white font-medium px-6 py-2 rounded hover:bg-[#8a3e3e] transition">
      View All Products
    </button>
  </div>
  
  <!-- Footer -->
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
        <ul class="text-sm space-y-1">
          <li>Atasan</li>
          <li>Bawahan </li>
          <li>Dress</li>
          <li>Lainnya</li>
        </ul>
      </div>
    </div>
    <p class="text-center text-xs mt-10">© 2025 Loopin. All rights reserved.</p>
  </footer>

  <script>
    function showProducts() {
      document.getElementById("more-products").classList.remove("hidden");
      document.getElementById("view-btn").style.display = 'none';
    }
  </script>
  
</body>
</html>
