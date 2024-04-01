<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'つぶやきアプリ'}}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @stack('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "M PLUS 1", sans-serif;
            font-optical-sizing: auto;
            font-weight: auto;
            font-style: normal;
        }
    </style>
</head>
<body class="bg-indigo-100">
    {{ $slot }}
</body>
</html>