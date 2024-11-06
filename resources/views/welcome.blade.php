<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CardFin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Bem-vindo ao CardFin</h1>
            <p class="text-lg mb-6">Gerencie seus empréstimos e cartões com facilidade.</p>
            <a href="{{ route('login') }}" class="px-4 py-2 bg-red-600 text-black rounded hover:bg-blue-700">
                Entrar
            </a>
            <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-red-600 text-black rounded hover:bg-green-700">
                Registrar
            </a>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
