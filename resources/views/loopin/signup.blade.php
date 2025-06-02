<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loopin - Sign Up</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Group.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F9F5EF]">
    <div class="min-h-screen flex items-center justify-center p-4 md:p-6">
        <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col md:flex-row w-full max-w-4xl lg:max-w-6xl">

            <!-- Left Image (Hidden on smaller screens, adjust as needed) -->
            <div class="hidden md:block md:w-1/2">
                <img src="{{ asset('signup.jpg') }}" alt="Clothes Rack" class="object-cover h-full w-full">
            </div>

            <!-- Right Form -->
            <div class="w-full md:w-1/2 bg-[#F9F5EF] p-8 md:p-12">

                <div class="mb-6 md:mb-8">
                    <a href="{{ route('home') }}"> {{-- Link logo ke home --}}
                        <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
                    </a>
                </div>

                <h2 class="text-xl md:text-2xl font-semibold text-black mb-5 md:mb-6">Buat Akun Baru</h2>

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <ul class="mt-1 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('signup') }}" method="POST" class="space-y-4"> {{-- Ganti action ke named route --}}
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="text-xs text-gray-600">Nama Depan</label>
                            <input type="text" name="first_name" id="first_name" placeholder="Nama Depan" value="{{ old('first_name') }}"
                                class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-500 text-sm" required>
                        </div>
                        <div>
                            <label for="last_name" class="text-xs text-gray-600">Nama Belakang</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Nama Belakang" value="{{ old('last_name') }}"
                                class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-500 text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="text-xs text-gray-600">Email</label>
                        <input type="email" name="email" id="email" placeholder="contoh@email.com" value="{{ old('email') }}"
                            class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-500 text-sm" required>
                    </div>

                    <div>
                        <label for="address" class="text-xs text-gray-600">Alamat Lengkap</label>
                        <textarea name="address" id="address" placeholder="Jalan, nomor rumah, RT/RW, kelurahan, kecamatan" rows="2"
                            class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-500 text-sm">{{ old('address') }}</textarea>
                    </div>

                    <div>
                        <label for="password" class="text-xs text-gray-600">Password</label>
                        <input type="password" name="password" id="password" placeholder="Minimal 6 karakter"
                            class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-500 text-sm" required>
                    </div>
                     <div>
                        <label for="password_confirmation" class="text-xs text-gray-600">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password"
                            class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-500 text-sm" required>
                    </div>


                    <button type="submit"
                        class="w-full mt-6 bg-[#A54D4D] text-white py-2.5 rounded-md hover:bg-[#8d3f3f] transition font-semibold">
                        Buat Akun
                    </button>

                    <div class="flex items-center my-4">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="mx-3 text-gray-500 text-xs">atau</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>

                    <button type="button"
                        class="w-full flex items-center justify-center border border-gray-400 py-2 rounded-md bg-white hover:bg-gray-100 transition text-sm text-gray-700">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5 mr-2">
                        Daftar dengan Google
                    </button>
                </form>

                <p class="mt-6 text-sm text-gray-700 text-center">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="underline text-black hover:text-primary font-medium">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>