<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loopin - My Profile</title>
    <link rel="icon" type="image/x-icon" href="/Group.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">

    <!-- Navbar -->
  <nav class="bg-[#F8F1E7] flex items-center justify-between px-8 py-4 shadow-sm">
    <div class="flex-shrink-0">
      <img src="{{ asset('logo.svg') }}" alt="Loopin Logo" class="h-6">
    </div>
    <div class="flex space-x-20">
      <a href="/home" class="text-black font-bold hover:text-[#A54D4D]">Home</a>
      <a href="/explore" class="text-black font-bold hover:text-[#A54D4D]">Explore</a>
      <a href="/category" class="text-black font-bold hover:text-[#A54D4D]">Category</a>
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
    <div class="px-10 py-12 bg-white flex gap-10">
        <!-- Left Panel -->
        <div class="w-1/3 bg-[#FFFFFF] rounded-lg p-6 shadow-md">
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 bg-[#F5F5F5] rounded-full flex items-center justify-center text-5xl text-gray-400 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.761 0 5-2.686 5-6s-2.239-6-5-6-5 2.686-5 6 2.239 6 5 6zm0 2c-4.418 0-8 3.134-8 7h2c0-2.761 2.686-5 6-5s6 2.239 6 5h2c0-3.866-3.582-7-8-7z"/></svg>
                </div>
                <div class="text-left w-full space-y-4">
                    <div>
                        <p class="text-[#A54D4D] font-semibold text-sm">Username</p>
                        <div class="bg-[#F5F5F5] py-2 px-4 rounded-md font-semibold">Khalisha Nasya</div>
                    </div>
                    <div>
                        <p class="text-[#A54D4D] font-semibold text-sm">Email</p>
                        <div class="bg-[#F5F5F5] py-2 px-4 rounded-md font-semibold">KhalishaNasya@gmail.com</div>
                    </div>
                    <div>
                        <p class="text-[#A54D4D] font-semibold text-sm">Address</p>
                        <div class="bg-[#F5F5F5] py-2 px-4 rounded-md font-semibold">Darussalam, Banda Aceh, Aceh</div>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="/landing" class="flex items-center justify-center gap-2 text-[#A54D4D] font-semibold">
                  <img src="{{ asset('logout.svg') }}" alt="Logout Icon" class="h-20 w-20">
                </a>
              </div>
        </div>

        <!-- Right Panel -->
        <div class="w-2/3 bg-[#F5F5F5] rounded-lg p-8 shadow-md">
            <h2 class="text-xl font-semibold text-[#521018] mb-6">Your Profile</h2>
            <form action="#" method="POST" class="space-y-4">
                <!-- Personal Info -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[#521018] font-semibold mb-2">First Name</label>
                        <input type="text" placeholder="Adzra" class="mt-1 w-full p-2 rounded-md border border-gray-300 focus:outline-none" />
                    </div>
                    <div>
                        <label class="text-[#521018] font-semibold mb-2">Last Name</label>
                        <input type="text" placeholder="Zalvia" class="mt-1 w-full p-2 rounded-md border border-gray-300 focus:outline-none" />
                    </div>
                    <div>
                        <label class="text-[#521018] font-semibold mb-2">Email</label>
                        <input type="email" placeholder="Loopin@gmail.com" class="mt-1 w-full p-2 rounded-md border border-gray-300 focus:outline-none" />
                    </div>
                    <div>
                        <label class="text-[#521018] font-semibold mb-2">Address</label>
                        <input type="text" placeholder="Darussalam, Banda Aceh, Aceh" class="mt-1 w-full p-2 rounded-md border border-gray-300 focus:outline-none" />
                    </div>
                </div>

                <!-- Password Changes -->
                <div class="mt-6">
                    <h3 class="text-[#521018] font-semibold mb-2">Password Changes</h3>
                    <div class="space-y-3">
                        <input type="password" placeholder="Current Password" class="w-full p-2 rounded-md border border-gray-300 focus:outline-none" />
                        <input type="password" placeholder="New Password" class="w-full p-2 rounded-md border border-gray-300 focus:outline-none" />
                        <input type="password" placeholder="Confirm New Password" class="w-full p-2 rounded-md border border-gray-300 focus:outline-none" />
                    </div>
                </div>

                <!-- Save Button -->
                <div class="text-right mt-6">
                    <button type="button" id="saveChangesButton" class="bg-[#A54D4D] text-white px-6 py-2 rounded-md hover:bg-[#521018] transition">Save Changes</button>
                </div>
                
                <script>
                  document.getElementById('saveChangesButton').addEventListener('click', function() {
                    window.location.href = '/myprofile';
                  });
                </script>
            </form>
        </div>
    </div> 

</body>
</html>
