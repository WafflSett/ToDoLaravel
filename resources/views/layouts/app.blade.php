<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>To Do list</title>
</head>
<body class="min-h-screen flex flex-col bg-gray-100 dark:bg-gray-800">
    <header class="w-full bg-red-800 text-white text-start p-2">
        <div class="flex m-2 h-full justify-between align-middle">
            <h1 class="text-3xl font-bold text-gray-200">To Do list</h1>
            <div class="text-xl font-bold text-gray-200 my-auto">
                <button id="dark-toggler" class="border rounded-lg p-1 my-auto text-center">🌙</button>
            </div>
        </div>
    </header>
    <main class="flex-1 w-4/5 max-w-4/5 mx-auto px-4 bg-gray-100 dark:bg-gray-800 py-6 dark:text-gray-200">
        <div class="flex flex-start flex-col">
            @yield('content')
        </div>
    </main>
    <footer class="w-full bg-red-950 py-1 text-center text-white ">&copy; 2025 <a href="https://github.com/wafflsett" >TG</a></footer>
</body>
</html>
