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

