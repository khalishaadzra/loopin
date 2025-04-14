<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Loopin - Category</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="/Group.png">
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
  <style>
    /* Tambahan agar scroll tersembunyi di browser */
    .hide-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .hide-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>
</head>
<body class="bg-white text-[#521018]">

  <!-- Navbar -->
  <nav class="bg-[#F8F1E7] flex items-center justify-between px-8 py-4 shadow-sm">
    <div class="flex-shrink-0">
      <img src="logo.svg" alt="Loopin Logo" class="h-6">
    </div>
    <div class="flex space-x-20">
      <a href="/home" class="text-black font-semibold hover:text-[#A54D4D]">Home</a>
      <a href="/explore" class="text-black font-semibold hover:text-[#A54D4D]">Explore</a>
      <a href="/category" class="text-white font-semibold bg-[#A54D4D] px-4 py-1 rounded-full">Category</a>
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

  <main class="p-20 md:p-15 space-y-10">
  
    <div id="categories" class="space-y-10">
    </div>
  </main>
  
  <script>
    const categories = {
      "Atasan": [
        { name: "Kaos Pria", size: "XL", price: 50000, image: "/kaospria.png" },
        { name: "Kemeja Lengan Panjang Pria", size: "XL", price: 55000, image: "/kemeja.png" },
        { name: "Kaos Pria", size: "L", price: 65000, image: "/kaos.png" },
        { name: "Kemeja Wanita", size: "M", price: 75000, image: "/kemejawanita.png" },
        { name: "Blouse Putih Strip", size: "S", price: 50000, image: "/blouseputih.png" },
        { name: "Jaket Hoodie Pria", size: "L", price: 85000, image: "/Jaket Hoodie.jpg" },
        { name: "Cardigan Rajut", size: "M", price: 75000, image: "/Cardigan Rajut.jpg" },
        { name: "Blazer Formal Wanita", size: "M", price: 75000, image: "/Blazer Formal Wanita.jpg" },
      ],
      "Bawahan": [
        { name: "Celana Jogger", size: "M", price: 33000, image: "/jogger.png" },
        { name: "Celana Cutbray", size: "S", price: 39000, image: "/cutbray.png" },
        { name: "Rok Mini", size: "S", price: 30000, image: "/rokmini.png" },
        { name: "Rok Coklat", size: "S", price: 50000, image: "/rokcoklat.png" },
        { name: "Celana Wanita Cream", size: "M", price: 80000, image: "/celanacream.png" },
        { name: "Rok Plisket Wanita", size: "M", price: 35000, image: "/Rok Plisket.jpg" },
        { name: "Celana Jeans Slim Fit", size: "XL", price: 67000, image: "/Celana Jeans.jpg" },
        { name: "Celana Jogger", size: "M", price: 33000, image: "/jogger.png" },
        { name: "Celana Cutbray", size: "S", price: 39000, image: "/cutbray.png" },
      ],
      "Dress": [
        { name: "Gamis Wanita", size: "XL", price: 70000, image: "/gamis.png" },
        { name: "Mini Dress", size: "S", price: 88000, image: "/Dress Mini.jpg" },
        { name: "One Set Kemeja & Rok Mini", size: "S", price: 79000, image: "/oneset.png" },
        { name: "Elegant Dress", size: "S", price: 39000, image: "/elegantdress.png" },
        { name: "Slim Dress", size: "S", price: 39000, image: "/slimdress.png" },
        { name: "Gamis Wanita", size: "XL", price: 70000, image: "/gamis.png" },
        { name: "Mini Dress", size: "S", price: 88000, image: "/Dress Mini.jpg" },
        { name: "One Set Kemeja & Rok Mini", size: "S", price: 79000, image: "/oneset.png" },
      ],
      "Sepatu": [
        { name: "Sepatu Hitam Putih", size: "42", price: 68000, image: "/Sepatu Hitam Putih.jpeg" },
        { name: "Sepatu Sekolah", size: "41", price: 76000, image: "/Sepatu Sekolah.png" },
        { name: "Sneakers", size: "40", price: 85000, image: "/sneakers.jpg" },
        { name: "Heels Pantofel", size: "38", price: 95000, image: "/pantofel.png" },
        { name: "Sepatu PDH Pria", size: "44", price: 82000, image: "/sepatupdh.jpg" },
        { name: "Sepatu Hitam Putih", size: "42", price: 68000, image: "/Sepatu Hitam Putih.jpeg" },
        { name: "Sepatu Sekolah", size: "41", price: 76000, image: "/Sepatu Sekolah.png" },
        { name: "Sneakers", size: "40", price: 85000, image: "/sneakers.jpg" },
        { name: "Heels Pantofel", size: "38", price: 95000, image: "/pantofel.png" },
      ]
    };
  
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

</body>
</html>
