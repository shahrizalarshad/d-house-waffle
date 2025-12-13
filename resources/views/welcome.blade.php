<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Apartment POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-lg shadow-xl p-8 text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Apartment POS</h1>
            <p class="text-gray-600 mb-8">Buy & Sell within your community</p>
            
            <div class="space-y-3">
                <a href="{{ route('login') }}" class="block w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="block w-full bg-white text-blue-600 border-2 border-blue-600 py-3 rounded-lg hover:bg-blue-50 transition">
                    Register
                </a>
            </div>
        </div>
    </div>
</body>
</html>
