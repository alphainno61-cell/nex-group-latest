<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Logos - Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
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
                <a href="/admin/see-all" class="block py-2.5 px-4 rounded transition duration-200 bg-rose-600">Companies</a>
                <a href="/dashboard/welcome" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-rose-600">Settings</a>
                <a href="/logout" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-rose-600">Logout</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-800">Manage Company Logos</h1>
                <button onclick="openAddModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Logo
                </button>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-10">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($logos as $logo)
                            <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow duration-200">
                                <div class="flex justify-center mb-4 h-20 items-center">
                                    <img src="{{ $logo->url }}" 
                                         alt="{{ $logo->name }}" 
                                         class="max-h-full max-w-full object-contain"
                                         onerror="this.src='https://placehold.co/200x60?text={{ urlencode($logo->name) }}'">
                                </div>
                                <div class="text-center mb-3">
                                    <p class="font-semibold text-gray-800">{{ $logo->name }}</p>
                                    <p class="text-xs text-gray-500 mt-1 truncate">{{ $logo->url }}</p>
                                </div>
                                <div class="flex gap-2">
                                    <button onclick="openEditModal({{ $logo->id }}, '{{ addslashes($logo->name) }}', '{{ addslashes($logo->url) }}', '{{ addslashes($logo->redirect_url ?? '') }}')" 
                                            class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded text-sm">
                                        <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button onclick="deleteLogo({{ $logo->id }}, '{{ addslashes($logo->name) }}')" 
                                            class="flex-1 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded text-sm">
                                        <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold mb-4">Edit Logo</h2>
            <form id="editForm">
                <input type="hidden" id="logoId">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="logoName">
                        Name
                    </label>
                    <input type="text" id="logoName" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="logoUrl">
                        Upload Image
                    </label>
                    <input type="file" id="logoFile" accept="image/*"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-xs text-gray-500 mt-1">Choose an image file from your computer</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="redirectUrl">
                        Redirect URL
                    </label>
                    <input type="url" id="redirectUrl" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <p class="text-xs text-gray-500 mt-1">URL to redirect when the logo is clicked</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Preview</label>
                    <div class="border rounded p-4 bg-gray-50 flex justify-center items-center h-24">
                        <img id="logoPreview" src="" alt="Preview" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeEditModal()" 
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="addModal" class="modal">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold mb-4">Add New Logo</h2>
            <form id="addForm">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="addLogoName">
                        Name
                    </label>
                    <input type="text" id="addLogoName" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="addLogoUrl">
                        Upload Image
                    </label>
                    <input type="file" id="addLogoFile" accept="image/*"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <p class="text-xs text-gray-500 mt-1">Choose an image file from your computer</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="addRedirectUrl">
                        Redirect URL
                    </label>
                    <input type="url" id="addRedirectUrl" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <p class="text-xs text-gray-500 mt-1">URL to redirect when the logo is clicked</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Preview</label>
                    <div class="border rounded p-4 bg-gray-50 flex justify-center items-center h-24">
                        <img id="addLogoPreview" src="" alt="Preview" class="max-h-full max-w-full object-contain">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeAddModal()" 
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Logo
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Edit Modal Functions
        function openEditModal(id, name, url, redirectUrl) {
            document.getElementById('logoId').value = id;
            document.getElementById('logoName').value = name;
            document.getElementById('logoFile').value = '';
            document.getElementById('redirectUrl').value = redirectUrl;
            document.getElementById('logoPreview').src = url;
            document.getElementById('editModal').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('active');
        }

        // Add Modal Functions
        function openAddModal() {
            document.getElementById('addLogoName').value = '';
            document.getElementById('addRedirectUrl').value = '';
            document.getElementById('addLogoFile').value = '';
            document.getElementById('addLogoPreview').src = '';
            document.getElementById('addModal').classList.add('active');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.remove('active');
        }

        // Update preview on URL change - removed

        // Handle file upload for Edit
        document.getElementById('logoFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('logoPreview').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle file upload for Add
        document.getElementById('addLogoFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('addLogoPreview').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Edit Form Submit
        document.getElementById('editForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const id = document.getElementById('logoId').value;
            const name = document.getElementById('logoName').value;
            const redirectUrl = document.getElementById('redirectUrl').value;
            const fileInput = document.getElementById('logoFile').files[0];

            const formData = new FormData();
            formData.append('name', name);
            formData.append('redirect_url', redirectUrl);
            formData.append('_method', 'PUT');
            
            if (fileInput) {
                formData.append('image', fileInput);
            }

            try {
                const response = await fetch(`/logos/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                if (response.ok) {
                    location.reload();
                } else {
                    const data = await response.json();
                    alert('Failed to update logo: ' + (data.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while updating the logo');
            }
        });

        // Add Form Submit
        document.getElementById('addForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const name = document.getElementById('addLogoName').value;
            const redirectUrl = document.getElementById('addRedirectUrl').value;
            const fileInput = document.getElementById('addLogoFile').files[0];

            const formData = new FormData();
            formData.append('name', name);
            formData.append('redirect_url', redirectUrl);
            
            if (fileInput) {
                formData.append('image', fileInput);
            } else {
                alert('Please upload an image');
                return;
            }

            try {
                const response = await fetch('/logos', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                if (response.ok) {
                    location.reload();
                } else {
                    const data = await response.json();
                    alert('Failed to add logo: ' + (data.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while adding the logo');
            }
        });

        // Delete Function
        async function deleteLogo(id, name) {
            if (!confirm(`Are you sure you want to delete "${name}"?`)) {
                return;
            }

            try {
                const response = await fetch(`/logos/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (response.ok) {
                    location.reload();
                } else {
                    alert('Failed to delete logo');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while deleting the logo');
            }
        }

        // Close modal on outside click
        window.onclick = function(event) {
            const editModal = document.getElementById('editModal');
            const addModal = document.getElementById('addModal');
            if (event.target === editModal) {
                closeEditModal();
            }
            if (event.target === addModal) {
                closeAddModal();
            }
        }
    </script>
</body>
</html>
