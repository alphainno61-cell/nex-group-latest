<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEX Group | Organization & Vision</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff; /* Pure white background for a clean corporate look */
        }
    </style>
</head>
<body class="antialiased text-gray-800">

    <!-- Header & Navigation -->
    <header class="bg-white sticky top-0 z-20 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo/Brand Name - NEX GROUP (Text Only) -->
                <a href="#" class="flex items-center space-x-2 transition duration-150 ease-in-out">
                    <!-- Removed the SVG icon here -->
                    <span class="text-3xl font-extrabold text-gray-700 tracking-tight">
                        NEX GROUP
                    </span>
                </a>
                
                <!-- Desktop Navigation - Only Investor Relations remains -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#investor" class="text-lg font-medium text-gray-600 hover:text-blue-600 transition duration-150">Investor Relations</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-expanded="false">
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) - Only Investor Relations remains -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg border-t border-gray-100">
            <div class="pt-2 pb-3 space-y-1 px-4">
                <a href="#investor" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-blue-600">Investor Relations</a>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section: Now single-column (full width) -->
        <section class="py-24 sm:py-32 lg:py-40 bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Main container for content and button, using flex to align the button -->
                <div class="flex flex-col md:flex-row justify-between items-start gap-12">
                    
                    <!-- Left Block: Text Content (max-w-xl keeps it constrained like the original design) -->
                    <div class="space-y-8 max-w-xl">
                        
                        <!-- Stylized Letter and Motto -->
                        <div class="space-y-4">
                            <!-- Large Stylized 'N' (Color is red-600: #dc2626) -->
                            <div class="text-7xl font-extrabold text-white bg-red-600 shadow-xl rounded-xl p-3 h-20 w-20 flex items-center justify-center translate-y-2">
                                N
                            </div>
                            <h1 class="text-5xl sm:text-6xl font-light tracking-tight text-gray-900 leading-none">
                                is for <strong class="font-extrabold">NEX</strong>
                            </h1>
                        </div>

                        <!-- Founder Quote -->
                        <div class="max-w-md pt-8">
                            <p class="text-lg text-gray-700 leading-relaxed">
                                As we outlined in our initial letter, "NEX is not a conventional company. We do not intend to become one." We believe true innovation requires long-term patience and structural freedom.
                            </p>
                        </div>
                        
                        <!-- Signature Block -->
                        <div class="pt-8">
                            <!-- Simplified signature approximation using a custom font style -->
                            <p class="text-3xl text-gray-900 font-serif" style="font-family: 'Brush Script MT', 'Cursive', sans-serif;">
                                Engr. Mohammad Shahrair Khan
                            </p>
                            <div class="mt-4 border-b border-gray-300 w-48"></div>
                            <p class="mt-2 text-sm text-gray-500 font-medium">Engr. Mohammad Shahrair Khan</p>
                            <p class="mt-2 text-sm text-gray-500 font-medium">Research Fellow || APU, Malaysia</p>
                        </div>
                    </div>

                    <!-- Right Block: See All Button with surrounding abstract icons -->
                    <div class="w-full md:w-auto relative flex justify-start md:justify-end pt-16 md:pt-[10rem]" style="margin-right: 120px;">
                        
                        <!-- Abstract Tech Icons (for visual interest around the button) -->
                        <div class="hidden md:block absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full pointer-events-none">
                            <!-- Blue Node (Top Left relative to button) -->
                            <div class="absolute -top-10 -left-10 w-8 h-8 rounded-full bg-blue-400 opacity-60 blur-sm"></div>
                            
                            <!-- Connecting Line -->
                            <div class="absolute -top-10 left-0 w-20 h-px bg-gray-300 transform rotate-[-45deg] origin-left"></div>
                            
                            <!-- Green Node (Bottom Right relative to button) -->
                            <div class="absolute bottom-4 -right-10 w-6 h-6 rounded-full bg-green-500 opacity-50 blur-sm"></div>

                            <!-- Small Data Cube (Top Right relative to button) -->
                            <div class="absolute -top-12 right-2 w-3 h-3 bg-red-500 opacity-70 transform rotate-45"></div>
                        </div>

                        <!-- The actual button (ensuring it stays on top) -->
                        <a href="/see-all" class="inline-block px-8 py-3 bg-red-600 text-white font-semibold rounded-full shadow-lg hover:bg-red-700 transition duration-300 transform hover:scale-[1.02] active:scale-[0.98] whitespace-nowrap relative z-10">
                            See All
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
    </main>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const button = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');

            // Toggle menu visibility
            const toggleMenu = () => {
                const isExpanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', !isExpanded);
                menu.classList.toggle('hidden');
            };

            button.addEventListener('click', toggleMenu);
            
            // Close menu when a link is clicked
            menu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (!menu.classList.contains('hidden')) {
                        toggleMenu(); // Use the toggle function to ensure attributes are reset
                    }
                });
            });
        });
    </script>
</body>
</html>