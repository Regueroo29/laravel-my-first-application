<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<nav class="bg-gray-800 p-4">
    <div class="flex space-x-4">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
    </div>
</nav>

<main class="p-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">{{ $heading }}</h1>
    {{ $slot }}
</main>

</body>
</html>
