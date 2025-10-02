<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>To Do list</title>
</head>
<body class="min-h-screen flex flex-col bg-gray-100">
    <header class="w-full bg-red-800 text-white text-center p-4">
        <div class="flex justify-center items-center mb-2 h-full">
            <h1 class="text-6xl font-bold text-gray-200">To Do list</h1>
        </div>
    </header>
    <main class="flex-1 w-4/5 mx-auto px-4 bg-gray-100 py-6">
        <div class="flex flex-start flex-col">
            @yield('content')
        </div>
    </main>
    <footer class="w-full bg-red-950 py-2 text-center text-white">&copy; 2025 <a href="https://github.com/wafflsett" >TG</a></footer>
</body>
</html>
