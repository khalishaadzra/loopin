<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loopin-landing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="font-sans text-gray-800">

    <!-- Navbar -->
    <nav class="flex justify-between items-center px-6 py-4 shadow-sm bg-white sticky top-0 z-50">
        <div class="flex items-center gap-2">
            <img src="logo.svg" alt="Loopin Logo" class="h-7">
        </div>
        <ul class="flex gap-20 font-medium">
            <li><a href="#hero" class="hover:text-primary">Home</a></li>
            <li><a href="#about" class="hover:text-primary">About Us</a></li>
            <li><a href="#category" class="hover:text-primary">Category</a></li>
        </ul>
        <a href="/login">
            <button class="bg-primary text-white px-4 py-1 rounded-full">Login</button>
        </a>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="py-20 px-4 md:px-0">
        <div class="bg-background rounded-3xl max-w-7xl mx-auto px-6 md:px-20 py-12 flex flex-col md:flex-row items-center justify-between shadow-sm">
            <div class="space-y-4 max-w-md">
                <h1 class="text-5xl font-bold text-primary">Fresh Fits<br>Sustainable Picks</h1>
                <div class="flex gap-8 text-lg font-semibold">
                    <div><span class="text-2xl">20+</span><br><span class="text-sm font-normal">item baru</span></div>
                    <div><span class="text-2xl">70+</span><br><span class="text-sm font-normal">pembeli</span></div>
                </div>
                <div class="relative">
                    <input type="text" placeholder="Apa yang kamu cari?" class="w-full px-4 py-2 border rounded-full">
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400">🔍</button>
                </div>
            </div>
            <img src="ilustrasi.png" alt="Ilustrasi" class="w-80 mt-8 md:mt-0">
        </div>
    </section>

    <!-- Keunggulan -->
    <section class="py-6">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="flex flex-col items-center text-center">
                        <div class="mb-2 w-10 h-10">
                            <img src="curated.svg" alt="Curated" class="w-full h-full">
                        </div>
                        <h3 class="font-bold">Curated Styles</h3>
                        <p class="text-sm">Hanya item terpilih dengan kondisi terbaik.</p>
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div class="mb-2 w-10 h-10">
                            <img src="deals.svg" alt="Deals" class="w-full h-full">
                        </div>
                        <h3 class="font-bold">Deals You'll Love</h3>
                        <p class="text-sm">Harga bersahabat, kualitas tetap bagus</p>
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div class="mb-2 w-10 h-10">
                            <img src="ready.svg" alt="Ready" class="w-full h-full">
                        </div>
                        <h3 class="font-bold">Ready to Wear</h3>
                        <p class="text-sm">lebih hemat, lebih ramah lingkungan.</p>
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div class="mb-2 w-10 h-10">
                            <img src="sustainable.svg" alt="Sustainable" class="w-full h-full">
                        </div>
                        <h3 class="font-bold">Sustainable Choice</h3>
                        <p class="text-sm">Bersih, rapi, dan layak pakai</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="about" class="py-20 bg-white pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-primary mb-2">About Us</h2>
            <p class="text-center max-w-3xl mx-auto text-sm mb-12">
                Loopin is your go-to destination for Fresh Fits & Sustainable Picks.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="grid grid-cols-2 grid-rows-2 gap-4 justify-center md:pl-12">
                    <img src="about1.png" alt="About 1" class="rounded shadow w-[300px] h-auto object-cover row-start-1 col-start-1">
                    <img src="about2.png" alt="About 2" class="rounded shadow w-[185px] h-auto object-cover row-start-1 col-start-2">
                    <img src="about3.png" alt="About 3" class="rounded shadow w-[290px] h-auto object-cover col-span-2 row-start-2 mx-auto">
                </div>
                <ul class="space-y-6 text-left md:text-base px-4 md:pl-8">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary text-lg mr-3 mt-1"></i>
                        <div>
                            <strong>Temukan Gaya Favoritmu:</strong>
                            <div class="mt-1">Jelajahi koleksi preloved dari basic sampai branded.</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary text-lg mr-3 mt-1"></i>
                        <div>
                            <strong>Belanja Praktis & Aman:</strong>
                            <div class="mt-1">Pilih item kamu suka dan beli lewat tombol yang tersedia.</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary text-lg mr-3 mt-1"></i>
                        <div>
                            <strong>Harga Bersahabat:</strong>
                            <div class="mt-1">Nikmati pilihan fashion berkualitas dengan harga bersahabat.</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-primary text-lg mr-3 mt-1"></i>
                        <div>
                            <strong>Dukung Fashion Berkelanjutan:</strong>
                            <div class="mt-1">Setiap barang yang berpindah tangan = bumi yang lebih baik.</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <!-- Category -->
    <section class="py-10">
        <div class="max-w-7xl mx-auto px-6 py-20">
            <h2 class="text-2xl font-bold text-primary mb-8 text-center">Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-background rounded-3xl py-8 flex flex-col items-center shadow-sm">
                    <img src="atasanc.svg" alt="Atasan" class="w-12 h-12 mb-2" />
                    <p class="font-medium text-primary">Atasan</p>
                </div>
                <div class="bg-background rounded-3xl py-8 flex flex-col items-center shadow-sm">
                    <img src="bawahanc.svg" alt="Bawahan" class="w-12 h-12 mb-2" />
                    <p class="font-medium text-primary">Bawahan</p>
                </div>
                <div class="bg-background rounded-3xl py-8 flex flex-col items-center shadow-sm">
                    <img src="dressc.svg" alt="Dress" class="w-12 h-12 mb-2" />
                    <p class="font-medium text-primary">Dress</p>
                </div>
                <div class="bg-background rounded-3xl py-8 flex flex-col items-center shadow-sm">
                    <img src="sepatuc.svg" alt="Sepatu" class="w-12 h-12 mb-2" />
                    <p class="font-medium text-primary">Sepatu</p>
                </div>
            </div>
        </div>
</section>

    <!-- Footer / Category -->
    <section id="category">
        <footer class="bg-dark text-white py-20 px-6">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <div>
                    <img src="footerlog.svg" alt="Loopin Logo" class="h-6 mx-auto md:mx-0">
                    <p class="text-sm mt-2">We help you find your fits!</p>
                    <div class="flex justify-center md:justify-start space-x-8 mt-6 text-xl">
                        <a href="#" class="hover:text-secondary"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-secondary"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-secondary"><i class="fab fa-twitter"></i></a>
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
                        <li>Bawahan</li>
                        <li>Dress</li>
                        <li>Lainnya</li>
                    </ul>
                </div>
            </div>
            <p class="text-center text-xs mt-10">© 2025 Loopin. All rights reserved.</p>
        </footer>
    </section>
</body>
</html>
