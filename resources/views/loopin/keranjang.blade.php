<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang - Loopin</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- Link ke font Inter jika belum ada global --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#A54D4D] font-bold" viewBox="0 0 24 24" fill="currentColor">
          <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zM7.334 13l.94 2h8.412l3.264-7H6.25l-1-2H2v2h2l3.6 7.59L5.25 17h13v-2H7.334z"/>
        </svg>
        @if(isset($cartItemCount) && $cartItemCount > 0)
          <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">{{ $cartItemCount }}</span>
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

  <main class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-[#521018] mb-8">Keranjang Belanja</h1>

    @if(session('success'))
        {{-- ... pesan sukses ... --}}
    @endif
    @if(session('error'))
        {{-- ... pesan error ... --}}
    @endif

    @if(isset($cartItems) && $cartItems->count() > 0)
        <form action="{{ route('checkout.index') }}" method="GET" id="checkoutForm"> 
            <div class="space-y-6 mb-8">
                @foreach($cartItems as $item)
                <div class="flex flex-col sm:flex-row items-center justify-between bg-white shadow rounded-xl p-4">
                    <div class="flex items-center space-x-4 mb-4 sm:mb-0 flex-grow">
                        {{-- Checkbox untuk memilih item --}}
                        <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="form-checkbox h-5 w-5 text-primary rounded focus:ring-primary" checked> {{-- 'checked' default --}}

                        <img src="{{ asset($item->attributes->image_filename ?? 'placeholder.png') }}" alt="{{ $item->name }}" class="w-16 h-16 object-cover rounded">
                        <div>
                            <a href="{{ route('products.show', $item->attributes->slug ?? '#') }}" class="text-[#521018] font-medium hover:text-primary">{{ $item->name }}</a>
                            <p class="text-sm text-gray-500">Harga: Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center w-full sm:w-auto">
                        {{-- Form Update Kuantitas --}}
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center space-x-2 update-quantity-form">
                            @csrf
                            <label for="quantity-{{$item->id}}" class="text-sm sr-only">Qty:</label>
                            <input type="number" id="quantity-{{$item->id}}" name="quantity" value="{{ $item->quantity }}" min="1" data-item-id="{{ $item->id }}" class="w-16 border border-gray-300 rounded text-center p-1 quantity-input">
                            <button type="submit" class="text-xs bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded">Update</button>
                        </form>
                        <span class="text-[#521018] font-semibold mx-4 sm:mx-6" id="subtotal-{{ $item->id }}">Subtotal: Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                        {{-- Tombol Hapus --}}
                        <a href="{{ route('cart.remove', $item->id) }}" onclick="return confirm('Hapus item ini dari keranjang?')" class="ml-4 text-red-500 hover:text-red-700" title="Hapus item">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" /></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10 flex flex-col sm:flex-row justify-between items-center border-t pt-6">
                <div class="text-lg font-semibold mb-4 sm:mb-0">
                    Total Item Dipilih: <span class="text-primary" id="selectedTotal">Rp 0</span>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('cart.clear') }}" onclick="return confirm('Anda yakin ingin mengosongkan keranjang?')"
                       class="bg-gray-300 text-gray-700 font-semibold text-base px-6 py-2.5 rounded-md hover:bg-gray-400">
                      Kosongkan Keranjang
                    </a>
                    {{-- Tombol Checkout Item Terpilih --}}
                    <button type="submit" form="checkoutForm"
                       class="bg-[#A54D4D] text-white font-semibold text-base px-6 py-2.5 rounded-md hover:bg-[#8d3f3f]">
                      Checkout Item Terpilih
                    </button>
                </div>
            </div>
        </form> 
    @else
    @endif
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const selectedTotalElement = document.getElementById('selectedTotal');
        const cartItems = @json($cartItems->keyBy('id')->map(function($item) { return ['price' => $item->price, 'quantity' => $item->quantity]; }));

        function calculateSelectedTotal() {
            let total = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const itemId = checkbox.value;
                    const itemData = cartItems[itemId];
                    if (itemData) {
                        const quantityInput = document.querySelector(`input[data-item-id="${itemId}"]`);
                        const quantity = quantityInput ? parseInt(quantityInput.value) : itemData.quantity;
                        total += itemData.price * quantity;
                    }
                }
            });
            selectedTotalElement.textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', calculateSelectedTotal);
        });

        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                // Update subtotal per item jika perlu (tidak diimplementasikan di sini, fokus ke total terpilih)
                // Untuk update subtotal per item, Anda perlu menyimpan harga per item di data-attribute
                const itemId = this.dataset.itemId;
                const itemData = cartItems[itemId];
                if (itemData) {
                    const newSubtotal = itemData.price * parseInt(this.value);
                    document.getElementById(`subtotal-${itemId}`).textContent = 'Subtotal: Rp ' + newSubtotal.toLocaleString('id-ID');
                }
                calculateSelectedTotal(); 
            });
        });

        // Hitung total saat halaman pertama kali dimuat
        calculateSelectedTotal();
    });
</script>

</body>
</html>