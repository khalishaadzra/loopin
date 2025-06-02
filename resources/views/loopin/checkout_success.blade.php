<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout Berhasil - Loopin</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100">
    <div id="popupSuccess" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl p-6 md:p-8 max-w-md w-full text-center relative shadow-xl">
            <a href="{{ route('home') }}" id="closePopup" class="absolute top-3 right-4 text-gray-400 hover:text-gray-600 text-2xl font-bold cursor-pointer">×</a>
            <img src="{{ asset('Checkout Berhasil.png') }}" alt="Checkout Success" class="mx-auto mb-5 w-28 h-28 md:w-32 md:h-32" />
            <h2 class="text-xl md:text-2xl font-bold text-dark mb-2">Pesanan Diterima!</h2>
            <p class="text-gray-600 mb-3 text-sm md:text-base">Nomor Pesanan Anda: <strong class="text-primary">{{ $order->order_number }}</strong></p>
            <p class="text-gray-500 text-sm md:text-base">Terima kasih telah berbelanja. Pesananmu akan segera kami proses.</p>
            <div class="mt-6 space-y-3">
                {{-- Link ke halaman detail pesanan di profil pengguna --}}
                <a href="{{ route('profile.orders.show', $order->id) }}"
                   class="block w-full bg-primary text-white py-2.5 px-4 rounded-lg font-semibold hover:bg-[#8d3f3f] transition text-sm md:text-base">
                    Lihat Detail Pesanan
                </a>
                <a href="{{ route('products.explore') }}"
                   class="block w-full bg-gray-200 text-dark py-2.5 px-4 rounded-lg font-semibold hover:bg-gray-300 transition text-sm md:text-base">
                    Lanjut Belanja
                </a>
            </div>
        </div>
    </div>
    {{-- Script untuk tombol close jika diperlukan (meski link ke home sudah ada) --}}
    <script>
        document.getElementById('closePopup').addEventListener('click', function(e) {
            e.preventDefault(); // Hentikan aksi default jika ini tombol, bukan link
            document.getElementById('popupSuccess').classList.add('hidden');
            // Jika ingin tetap di halaman tapi modal hilang (tidak disarankan jika sudah redirect)
        });
    </script>
</body>
</html>