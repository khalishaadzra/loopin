<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loopin - Sign Up</title>
    <link rel="icon" type="image/x-icon" href="/Group.png">
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
                <h2 class="text-2xl font-semibold text-black mb-6">Create an account</h2>

                <!-- Form -->
                <form action="#" method="POST" class="space-y-4">
                    <input type="text" name="name" placeholder="Name" class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-600">

                    <input type="text" name="email" placeholder="Email or Phone Number" class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-600">

                    <input type="password" name="password" placeholder="Password" class="w-full border-b border-gray-400 bg-transparent focus:outline-none py-2 placeholder-gray-600">

                    <!-- Create Account Button -->
                    <a href="/home" class="block w-full mt-6 bg-[#A54D4D] text-white py-2 rounded-md text-center hover:bg-[#521018] transition">
                        Create Account
                    </a>

                    <!-- OR -->
                    <div class="flex items-center my-4">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="mx-3 text-gray-500">or</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>

                    <!-- Google Button -->
                    <button type="button" class="w-full flex items-center justify-center border border-gray-400 py-2 rounded-md bg-white hover:bg-gray-100 transition">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5 mr-2">
                        Sign up with Google
                    </button>
                </form>

                <!-- Already have account -->
                <p class="mt-6 text-sm text-gray-700 text-center">
                    Already have account?
                    <a href="/login" class="underline text-black hover:text-[#A54D4D]">Log in</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
