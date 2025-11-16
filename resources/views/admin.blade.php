<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <div x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <aside x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white z-30 flex flex-col">
            <div class="flex items-center justify-center h-20 border-b border-gray-800">
                 <svg class="w-12 h-12" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="35,0 65,0 45,100 15,100" fill="currentColor" class="text-gray-700"></polygon>
                    <polygon points="55,0 85,0 65,100 35,100" fill="currentColor" class="text-red-600"></polygon>
                </svg>
                <h1 class="text-2xl font-bold ml-2">Admin</h1>
            </div>
            <nav class="flex-grow mt-4">
                <a href="#" class="flex items-center py-3 px-6 text-gray-300 bg-gray-800 border-l-4 border-red-500">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center py-3 px-6 text-gray-400 hover:bg-gray-800 hover:text-white transition duration-200">
                   <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Content
                </a>
                <a href="#" class="flex items-center py-3 px-6 text-gray-400 hover:bg-gray-800 hover:text-white transition duration-200">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Settings
                </a>
            </nav>
             <div class="mt-auto p-6">
                <a href="/login" class="flex items-center py-3 px-6 text-gray-400 hover:bg-gray-800 hover:text-white transition duration-200">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </a>
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-1 flex flex-col transition-all duration-300" :class="{ 'ml-64': sidebarOpen }">
            <!-- Header -->
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
                <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
                 <div class="relative">
                    <button class="flex items-center space-x-2">
                        <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Admin" class="w-10 h-10 rounded-full">
                        <span class="hidden md:inline">Admin</span>
                    </button>
                </div>
            </header>

            <!-- Content -->
            <div class="p-6 md:p-8 flex-grow">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Welcome, Admin!</h2>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between transform hover:scale-105 transition-transform duration-300">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Visits</p>
                            <p class="text-2xl font-bold">45,231</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                    </div>
                     <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between transform hover:scale-105 transition-transform duration-300">
                        <div>
                            <p class="text-sm font-medium text-gray-500">New Users</p>
                            <p class="text-2xl font-bold">2,512</p>
                        </div>
                         <div class="bg-red-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between transform hover:scale-105 transition-transform duration-300">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Sales</p>
                            <p class="text-2xl font-bold">$8,230</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                             <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4z"></path></svg>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between transform hover:scale-105 transition-transform duration-300">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Performance</p>
                            <p class="text-2xl font-bold">98.5%</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                    </div>
                </div>
                
                <!-- Content Management Sections -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-xl font-bold mb-4">Manage Content</h3>
                        <ul class="space-y-3">
                            <li class="flex justify-between items-center bg-gray-50 p-3 rounded-lg"><a href="#" class="text-gray-700 hover:text-red-500">Home Page Sections</a><button class="text-sm bg-red-500 text-white py-1 px-3 rounded-full hover:bg-red-600">Manage</button></li>
                            <li class="flex justify-between items-center bg-gray-50 p-3 rounded-lg"><a href="#" class="text-gray-700 hover:text-red-500">Services & Offerings</a><button class="text-sm bg-red-500 text-white py-1 px-3 rounded-full hover:bg-red-600">Manage</button></li>
                            <li class="flex justify-between items-center bg-gray-50 p-3 rounded-lg"><a href="#" class="text-gray-700 hover:text-red-500">Client Testimonials</a><button class="text-sm bg-red-500 text-white py-1 px-3 rounded-full hover:bg-red-600">Manage</button></li>
                        </ul>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
                        <div class="flex space-x-4">
                           <button class="flex-1 bg-red-500 text-white py-3 px-4 rounded-lg shadow-md hover:bg-red-600 transition-colors">Create New Post</button>
                           <button class="flex-1 bg-gray-200 text-gray-800 py-3 px-4 rounded-lg shadow-md hover:bg-gray-300 transition-colors">Clear Cache</button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>