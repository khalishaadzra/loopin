<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loopin - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F9F5EF]">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden flex w-full max-w-6xl">
            <!-- Left Image -->
            <div class="w-1/2">
                <img src="{{ asset('signup.jpg') }}" alt="Clothes Rack" class="object-cover h-full w-full">
            </div>

            <!-- Right Form -->
            <div class="w-1/2 bg-[#F9F5EF] p-12">
                <!-- Logo -->
                <div class="mb-8">
                    <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
                </div>

                <!-- Title -->
                <h2 class="text-2xl font-semibold text-black mb-6">Log in to Loopin</h2>

                <!-- Form -->
                <form action="#" method="POST" class="space-y-4">
                    <input type="text" name="email" placeholder="Email or Phone Number" class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-600">
                    <input type="password" name="password" placeholder="Password" class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-600">

                    <!-- Buttons -->
                    <div class="flex items-center justify-between mt-6">
                        <button type="button" onclick="window.location.href='/home'" class="bg-[#A54D4D] text-white px-6 py-2 rounded-md hover:bg-[#521018] transition">
                            Log In
                        </button>
                        <a href="#" class="text-[#A54D4D] text-sm hover:underline">Forgot Password?</a>
                    </div>
                </form>

                <!-- Don't have an account yet -->
                <p class="mt-10 text-sm text-gray-700 text-center">
                    Don’t have an account yet?
                    <a href="/signup" class="underline text-black hover:text-[#A54D4D]">Sign up</a>
                </p>

            </div>
        </div>
    </div>
</body>
</html>
