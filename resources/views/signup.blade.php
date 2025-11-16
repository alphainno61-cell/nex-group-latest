<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - NEX</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7fafc;
        }
        .signup-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }
        .signup-title {
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
        .signup-button {
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
        .signup-button:hover {
            background-color: #4a5568;
        }
        .login-link {
            text-align: center;
            margin-top: 16px;
        }
        .login-link a {
            color: #2d3748;
            text-decoration: none;
            font-weight: 700;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="signup-container">
        <h2 class="signup-title">Sign Up</h2>
        <form action="/signup" method="POST">
            <input type="text" name="name" placeholder="Full Name" class="form-input" required>
            <input type="email" name="email" placeholder="Email Address" class="form-input" required>
            <input type="password" name="password" placeholder="Password" class="form-input" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-input" required>
            <button type="submit" class="signup-button">Sign Up</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="/login">Sign In</a></p>
        </div>
    </div>

</body>
</html>