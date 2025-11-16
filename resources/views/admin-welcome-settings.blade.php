<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page Settings - Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar-link:hover {
            background-color: #e11d48 !important;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div class="w-64 text-white p-5" style="background-color: #f43f5e;">
            <h2 class="text-2xl font-bold mb-10">Dashboard</h2>
            <nav>
                <a href="/dashboard" class="block py-2.5 px-4 rounded transition duration-200 sidebar-link">Home</a>
                <a href="/admin/see-all" class="block py-2.5 px-4 rounded transition duration-200 sidebar-link">Companies</a>
                <a href="/dashboard/welcome" class="block py-2.5 px-4 rounded transition duration-200 sidebar-link" style="background-color: #e11d48;">Settings</a>
                <a href="/logout" class="block py-2.5 px-4 rounded transition duration-200 sidebar-link">Logout</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-800">Welcome Page Settings</h1>
                <a href="/" target="_blank" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Preview Page
                </a>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-10">
                <div class="bg-white rounded-lg shadow p-6">
                    <form id="settingsForm" enctype="multipart/form-data">
                        
                        <!-- Site Title & Logo -->
                        <div class="mb-8 pb-6 border-b">
                            <h2 class="text-2xl font-bold mb-4 text-gray-800">Site Branding</h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="site_title">
                                        Site Title
                                    </label>
                                    <input type="text" id="site_title" name="site_title" value="{{ $settings->site_title }}" 
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                           required>
                                    <p class="text-xs text-gray-500 mt-1">Appears in header and title</p>
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="logo_image">
                                        Logo Image (Optional)
                                    </label>
                                    <input type="file" id="logo_image" name="logo_image" accept="image/*"
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <p class="text-xs text-gray-500 mt-1">Upload a logo to replace text branding</p>
                                    @if($settings->logo_image)
                                        <div class="mt-2">
                                            <img src="{{ $settings->logo_image }}" alt="Current Logo" class="h-12 object-contain">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Hero Section -->
                        <div class="mb-8 pb-6 border-b">
                            <h2 class="text-2xl font-bold mb-4 text-gray-800">Hero Section</h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hero_letter">
                                        Hero Letter
                                    </label>
                                    <input type="text" id="hero_letter" name="hero_letter" value="{{ $settings->hero_letter }}" 
                                           maxlength="5"
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                           required>
                                    <p class="text-xs text-gray-500 mt-1">The big letter in red box (e.g., "N")</p>
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hero_text">
                                        Hero Text
                                    </label>
                                    <input type="text" id="hero_text" name="hero_text" value="{{ $settings->hero_text }}" 
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                           required>
                                    <p class="text-xs text-gray-500 mt-1">Text after the letter (e.g., "is for NEX")</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="hero_description">
                                    Hero Description
                                </label>
                                <textarea id="hero_description" name="hero_description" rows="4"
                                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $settings->hero_description }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Main description/quote text</p>
                            </div>
                        </div>

                        <!-- Founder/Signature Section -->
                        <div class="mb-8 pb-6 border-b">
                            <h2 class="text-2xl font-bold mb-4 text-gray-800">Founder Signature</h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="signature_image">
                                        Signature Image
                                    </label>
                                    <input type="file" id="signature_image" name="signature_image" accept="image/*"
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <p class="text-xs text-gray-500 mt-1">Upload founder's signature image</p>
                                    @if($settings->signature_image)
                                        <div class="mt-2 p-4 bg-gray-50 rounded">
                                            <p class="text-xs text-gray-600 mb-2">Current Signature:</p>
                                            <img src="{{ $settings->signature_image }}" alt="Current Signature" class="h-16 object-contain">
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="founder_name">
                                        Founder Name
                                    </label>
                                    <input type="text" id="founder_name" name="founder_name" value="{{ $settings->founder_name }}" 
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                           required>
                                    <p class="text-xs text-gray-500 mt-1">Name displayed below signature</p>

                                    <label class="block text-gray-700 text-sm font-bold mb-2 mt-4" for="founder_title">
                                        Founder Title/Position
                                    </label>
                                    <input type="text" id="founder_title" name="founder_title" value="{{ $settings->founder_title }}" 
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <p class="text-xs text-gray-500 mt-1">Title/position displayed below name</p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold mb-4 text-gray-800">Navigation Links</h2>
                            
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="investor_link">
                                    Investor Relations Link
                                </label>
                                <input type="url" id="investor_link" name="investor_link" value="{{ $settings->investor_link }}" 
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                       placeholder="https://example.com/investors">
                                <p class="text-xs text-gray-500 mt-1">URL for the Investor Relations menu item</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Save Settings
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Success/Error Messages -->
                <div id="messageContainer" class="mt-4"></div>
            </main>
        </div>
    </div>

    <script>
        document.getElementById('settingsForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const messageContainer = document.getElementById('messageContainer');
            
            try {
                const response = await fetch('/dashboard/welcome/update', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    messageContainer.innerHTML = `
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            <strong>Success!</strong> ${data.message}
                        </div>
                    `;
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    messageContainer.innerHTML = `
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <strong>Error!</strong> ${data.message || 'Failed to update settings'}
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Error:', error);
                messageContainer.innerHTML = `
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <strong>Error!</strong> An error occurred while updating settings
                    </div>
                `;
            }

            // Auto-hide message after 5 seconds
            setTimeout(() => {
                messageContainer.innerHTML = '';
            }, 5000);
        });

        // Preview uploaded images
        document.getElementById('signature_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    // You can add preview logic here if desired
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('logo_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    // You can add preview logic here if desired
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
