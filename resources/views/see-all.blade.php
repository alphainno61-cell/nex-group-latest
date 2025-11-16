<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nex Group</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 1. Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- 2. Load Google Font (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- 3. Apply custom styles and font -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .logo-container-item {
            position: relative;
            transition: all 0.3s ease-in-out;
        }
        .logo-container-item img {
            transition: all 0.3s ease-in-out;
            filter: grayscale(100%);
        }

        .logo-container-item:hover img {
            filter: grayscale(0%);
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="min-h-screen flex flex-col">

        <!-- Main Content Area -->
        <div class="flex-grow">

            <!-- Section 1: Main Logo -->
            <header class="bg-white">
                <div class="max-w-7xl mx-auto flex flex-col items-center justify-center py-16 px-4">
                    
                    <!-- Recreated SVG Logo -->
                    <svg class="w-24 h-24" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <!-- Gray/Black part -->
                        <polygon points="35,0 65,0 45,100 15,100" fill="currentColor" class="text-gray-600"/>
                        <!-- Red part -->
                        <polygon points="55,0 85,0 65,100 35,100" fill="currentColor" class="text-red-600"/>
                    </svg>
                    
                    <!-- Title -->
                    <h1 class="text-4xl font-bold text-gray-700 tracking-wider mt-4">
                        NEX GROUP
                    </h1>
                </div>
            </header>

            <!-- Section 2: Company Logos -->
            <main class="bg-white py-16 px-4 border-t border-gray-100">
                <div class="max-w-6xl mx-auto flex flex-wrap justify-center items-center gap-x-10 gap-y-12">
                    
                    @foreach ($logos as $logo)
                        <div class="logo-container-item">
                            <a href="{{ $logo['url'] }}" target="_blank">
                                <img src="{{ $logo['url'] }}" alt="{{ $logo['name'] }}" class="h-10 w-auto object-contain" onerror="this.src='https://placehold.co/200x60?text={{ urlencode($logo['name']) }}'">
                            </a>
                        </div>
                    @endforeach

                </div>
            </main>

        </div>

        <!-- Section 3: Footer -->
        <footer class="bg-red-600 text-white shadow-inner">
            <!-- Grid container for contact info -->
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 py-12 px-8">
                
                <!-- Column 1: Phone -->
                <div class="flex items-start gap-4">
                    <!-- Phone Icon -->
                    <svg class="flex-shrink-0 w-8 h-8 opacity-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.836-.184-5.25-2.6-5.433-5.433l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    <div class="text-sm">
                        <p class="font-light">+880 1817 221100</p>
                        <p class="font-light">+880 1312 124545</p>
                    </div>
                </div>

                <!-- Column 2: Web / Email -->
                <div class="flex items-start gap-4">
                    <!-- Globe Icon -->
                    <svg class="flex-shrink-0 w-8 h-8 opacity-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c.24 0 .468.02.69.058m-6.918 6.182A9.004 9.004 0 0112 3c1.609 0 3.11.42 4.398 1.14m-8.796 12.72A9.001 9.001 0 0112 3c2.49 0 4.73.99 6.364 2.636M12 3c.24 0 .468-.02.69-.058m6.308 6.182A9.004 9.004 0 0112 21c-2.49 0-4.73-.99-6.364-2.636m12.728 0A9.001 9.001 0 0112 21c-1.609 0-3.11-.42-4.398-1.14m8.796-12.72A9.001 9.001 0 0112 21" />
                    </svg>
                    <div class="text-sm">
                        <a href="http://www.nexgroup.biz" target="_blank" class="font-light block hover:underline">www.nexgroup.biz</a>
                        <a href="mailto:hello.nexgroup@gmail.com" class="font-light block hover:underline">hello.nexgroup@gmail.com</a>
                    </div>
                </div>

                <!-- Column 3: Head Office -->
                <div class="flex items-start gap-4">
                    <!-- Location Icon -->
                    <svg class="flex-shrink-0 w-8 h-8 opacity-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <div class="text-sm">
                        <p class="font-semibold">Head Office</p>
                        <p class="font-light">50, Lake Circus, Level-5,</p>
                        <p class="font-light">Kalabagan, Dhaka - 1209</p>
                    </div>
                </div>

                <!-- Column 4: Corporate Office -->
                <div class="flex items-start gap-4">
                    <!-- Location Icon -->
                    <svg class="flex-shrink-0 w-8 h-8 opacity-90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <div class="text-sm">
                        <p class="font-semibold">Corporate Office</p>
                        <p class="font-light">Level-5, House 35/D, Road No. 9/A,</p>
                        <p class="font-light">Dhanmondi, Dhaka - 1209</p>
                    </div>
                </div>

            </div>
        </footer>

    </div>

</body>
</html>
