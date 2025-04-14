<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout - Loopin</title>
  <link rel="icon" type="image/x-icon" href="/Group.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    /* Modal toggle using checkbox */
    #popup-toggle:checked ~ #popupSuccess {
      display: flex;
    }
  </style>
</head>
<body class="bg-white text-[#521018]">

  <!-- Hidden Checkbox for Modal Toggle -->
  <input type="checkbox" id="popup-toggle" class="hidden" />

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
  <div class="max-w-6xl mx-auto p-8 flex flex-col lg:flex-row gap-12 bg-white mt-10 rounded-2xl shadow">
    <!-- Left Form -->
    <div class="w-full lg:w-1/2">
      <h1 class="text-3xl font-bold mb-8">Checkout</h1>
      <form class="space-y-6">
        <div>
          <label class="block text-gray-600 mb-2">Nama Penerima</label>
          <input type="text" class="w-full bg-[#F5F5F5] p-3 rounded focus:outline-none" />
        </div>
        <div>
          <label class="block text-gray-600 mb-2">Alamat Lengkap</label>
          <textarea rows="4" class="w-full bg-[#F5F5F5] p-3 rounded focus:outline-none"></textarea>
        </div>
        <div>
          <label class="block text-gray-600 mb-2">Detail Alamat</label>
          <input type="text" class="w-full bg-[#F5F5F5] p-3 rounded focus:outline-none" />
        </div>
        <div>
          <label class="block text-gray-600 mb-2">Nomor telepon</label>
          <input type="text" class="w-full bg-[#F5F5F5] p-3 rounded focus:outline-none" />
        </div>
      </form>
    </div>

    <!-- Right Summary -->
    <div class="w-full lg:w-1/2">
      <div class="flex items-center gap-4 mb-6">
        <img src="Sepatu Hitam Putih.jpeg" class="w-12 h-12" />
        <div class="flex justify-between w-full">
          <p>Sepatu Hitam Putih</p>
          <p class="text-[#521018] font-semibold">Rp 68.000</p>
        </div>
      </div>
      <div class="space-y-2 text-sm">
        <div class="flex justify-between">
          <span>Subtotal:</span>
          <span>Rp 68.000</span>
        </div>
        <hr class="my-4 border-[#ddd]" />
        <div class="flex justify-between">
          <span>Shipping:</span>
          <span>Rp 15.000</span>
        </div>
        <hr class="my-4 border-[#ddd]" />
        <div class="flex justify-between font-bold text-lg mt-2">
          <span>Total:</span>
          <span>Rp 83.000</span>
        </div>
      </div>

      <!-- Payment Method -->
      <div class="mt-6">
        <label class="inline-flex items-center">
          <input type="radio" checked class="form-radio text-[#A54D4D] mr-2" />
          <span class="text-[#521018]">Cash on delivery</span>
        </label>
      </div>

      <!-- Order Button = Label for the checkbox -->
      <label for="popup-toggle" class="cursor-pointer bg-[#A54D4D] text-white w-full mt-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#8d3f3f] transition inline-block text-center">Order</label>
    </div>
  </div>

    <!-- Modal Popup -->
    <div id="popupSuccess" class="fixed inset-0 bg-black bg-opacity-40 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 max-w-sm w-full text-center relative">
        <!-- Close Button -->
        <label id="closePopup" class="absolute top-4 right-4 text-[#A54D4D] text-xl font-bold cursor-pointer">×</label>
    
        <!-- Image -->
        <img src="{{ asset('Checkout Berhasil.png') }}" alt="Checkout Success" class="mx-auto mb-6 w-32 h-32" />
    
        <!-- Text -->
        <h2 class="text-2xl font-bold text-[#521018] mb-2">Checkout berhasil !</h2>
        <p class="text-[#A54D4D]">Barangmu akan segera dikirim</p>
        </div>
    </div>
    
    <script>
        // Mendapatkan elemen tombol close dengan id 'closePopup'
        document.getElementById('closePopup').addEventListener('click', function() {
        // Menutup modal dengan menambahkan class 'hidden'
        document.getElementById('popupSuccess').classList.add('hidden');
        
        // Mengarahkan pengguna ke halaman /home
        window.location.href = '/home';
        });
    </script>

</body>
</html>
