<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Loopin</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> {{-- Font Awesome --}}
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
    <div id="mobileMenu" class="hidden md:hidden bg-[#F8F1E7] shadow-lg py-2 fixed top-[68px] left-0 right-0 z-40"> {{-- Sesuaikan top jika tinggi navbar berubah --}}
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

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <div class="flex flex-col lg:flex-row gap-6 md:gap-8">
            <!-- Left Panel - Info Profil & Navigasi Akun -->
            <aside class="w-full lg:w-1/3 bg-white rounded-xl p-6 shadow-lg">
                <div class="flex flex-col items-center mb-6">
                    <div class="w-28 h-28 md:w-32 md:h-32 bg-gray-200 rounded-full flex items-center justify-center text-5xl text-gray-400 mb-4 overflow-hidden">
                            <i class="fas fa-user text-6xl text-gray-400"></i> 
                    </div>
                    <h2 class="text-xl font-semibold text-dark">{{ $user->name ?? 'Nama Pengguna' }}</h2>
                    <p class="text-sm text-gray-500">{{ $user->email ?? 'email@example.com' }}</p>
                    @if(isset($user->address) && $user->address)
                        <p class="text-xs text-gray-500 mt-1 text-center">{{ $user->address }}</p>
                    @endif
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('profile.index') }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-md hover:bg-gray-100 {{ request()->routeIs('profile.index') ? 'bg-secondary text-primary font-semibold' : 'text-gray-700' }} transition-colors">
                        <i class="fas fa-id-card w-5 text-center"></i>
                        <span>Pengaturan Profil</span>
                    </a>
                    <a href="{{ route('profile.orders') }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-md hover:bg-gray-100 {{ request()->routeIs('profile.orders') || request()->routeIs('profile.orders.show') ? 'bg-secondary text-primary font-semibold' : 'text-gray-700' }} transition-colors">
                        <i class="fas fa-box-open w-5 text-center"></i>
                        <span>Riwayat Pesanan</span>
                    </a>
                </nav>

                <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center justify-center w-full gap-2 text-red-600 font-semibold hover:bg-red-50 px-4 py-2.5 rounded-md transition duration-150 text-sm">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Right Panel - Konten Pengaturan Profil -->
            <section class="w-full lg:w-2/3 bg-white rounded-xl p-6 md:p-8 shadow-lg">
                <h1 class="text-xl md:text-2xl font-bold text-dark mb-6 border-b border-gray-200 pb-3">Pengaturan Profil Saya</h1>

                {{-- Pesan Sukses/Error Global untuk Form --}}
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                @endif
                @if(session('successPassword'))
                     <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                        <p class="font-medium">{{ session('successPassword') }}</p>
                    </div>
                @endif
                @if(session('errorProfile'))
                     <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                        <p class="font-bold">Oops! Terjadi kesalahan pada profil.</p>
                        <p>{{ session('errorProfile') }}</p>
                    </div>
                @endif
                @if(session('errorPassword'))
                     <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                        <p class="font-bold">Oops! Terjadi kesalahan pada password.</p>
                        <p>{{ session('errorPassword') }}</p>
                    </div>
                @endif


                    {{-- Form Update Profil --}}
                    <form action="{{ route('profile.update.profile') }}" method="POST" class="space-y-4 mb-10">
                      @csrf
                      <h3 class="text-lg font-semibold text-dark -mb-1">Informasi Pribadi</h3>
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                          <div>
                              <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Depan</label>
                              <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" required placeholder="Nama Depan Anda" class="mt-1 w-full p-2.5 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm" />
                              @error('first_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                          </div>
                          <div>
                              <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Belakang</label>
                              <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" placeholder="Nama Belakang Anda" class="mt-1 w-full p-2.5 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm" />
                              @error('last_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                          </div>
                          <div>
                              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                              <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" required placeholder="email@example.com" class="mt-1 w-full p-2.5 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm" />
                              @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                          </div>
                          <div> {{-- Pindahkan input email ke sini agar sejajar atau biarkan di bawah jika mau full width --}}
                              <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                              <textarea name="address" id="address" rows="3" placeholder="Alamat lengkap untuk pengiriman pesanan" class="mt-1 w-full p-2.5 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm">{{ old('address', $user->address ?? '') }}</textarea>
                              @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                          </div>
                      </div>
                      <div class="pt-2 text-right">
                          <button type="submit" class="bg-primary text-white px-6 py-2.5 rounded-md hover:bg-opacity-80 transition font-medium shadow-sm">
                              <i class="fas fa-save mr-2"></i>Simpan Informasi
                          </button>
                      </div>
                  </form>

            {{-- Form Update Password --}}
            <form action="{{ route('profile.update.password') }}" method="POST" class="space-y-4">
              @csrf
              <h3 class="text-lg font-semibold text-dark -mb-1">Ubah Password</h3>
              <div>
                  <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                  <input type="password" name="current_password" id="current_password" required placeholder="Masukkan password saat ini" class="w-full p-2.5 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm" />
                  @error('current_password', 'updatePassword') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
              </div>
              <div>
                  <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                  <input type="password" name="new_password" id="new_password" required placeholder="Minimal 6 karakter" class="w-full p-2.5 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm" />
                  @error('new_password', 'updatePassword') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
              </div>
              <div>
                  <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                  <input type="password" name="new_password_confirmation" id="new_password_confirmation" required placeholder="Ulangi password baru" class="w-full p-2.5 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm" />
              </div>
              <div class="pt-2 text-right">
                  <button type="submit" class="bg-primary text-white px-6 py-2.5 rounded-md hover:bg-opacity-80 transition font-medium shadow-sm">
                      <i class="fas fa-key mr-2"></i>Ubah Password
                  </button>
              </div>
            </form>

            </section>
        </div>
    </main>
    <!-- End Main Content -->

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