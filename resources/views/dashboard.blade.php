<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div class="w-64 bg-rose-500 text-white p-5">
            <h2 class="text-2xl font-bold mb-10">Dashboard</h2>
            <nav>
                <a href="/dashboard" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-rose-600">Home</a>
                <a href="/admin/see-all" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-rose-600">Companies</a>
                <a href="/dashboard/welcome" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-rose-600">Settings</a>
                <a href="/logout" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-rose-600">Logout</a>
            </nav>
        </div>
        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-800">Welcome to Your Dashboard!</h1>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-10">
                <div class="fade-in">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Chart placeholder -->
                        <div class="bg-white p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-2">Analytics Chart</h3>
                            <div class="h-64 bg-gray-100 rounded-md flex items-center justify-center">
                                <p class="text-gray-500">Chart will be displayed here</p>
                            </div>
                        </div>
                        <!-- Data table placeholder -->
                        <div class="bg-white p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-2">Recent Users</h3>
                            <table class="w-full text-left rounded-lg">
                                <thead>
                                    <tr class="text-gray-800 border border-b-0">
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="w-full font-light text-gray-700 bg-gray-100 whitespace-no-wrap border border-b-0">
                                        <td class="px-4 py-3">John Doe</td>
                                        <td class="px-4 py-3">john.doe@example.com</td>
                                        <td class="px-4 py-3">2024-05-24</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="bg-white shadow p-4 text-center">
                <p class="text-gray-600">© 2024 Admin Dashboard</p>
            </footer>
        </div>
    </div>
</body>
</html>