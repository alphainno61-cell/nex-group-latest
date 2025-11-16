<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NEX</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7fafc;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }
        .login-title {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 24px;
            text-align: center;
        }
        .form-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            margin-bottom: 16px;
            transition: border-color 0.3s ease;
        }
        .form-input:focus {
            outline: none;
            border-color: #4a5568;
        }
        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #2d3748;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #4a5568;
        }
        .signup-link {
            text-align: center;
            margin-top: 16px;
        }
        .signup-link a {
            color: #2d3748;
            text-decoration: none;
            font-weight: 700;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="login-container">
        <h2 class="login-title">Sign In</h2>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email Address" class="form-input" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" class="form-input" required>
            <button type="submit" class="login-button">Log In</button>
        </form>
        <div class="signup-link">
            <p>Don't have an account? <a href="/signup">Sign Up</a></p>
        </div>
    </div>

</body>
</html>