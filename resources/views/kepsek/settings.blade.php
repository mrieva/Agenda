<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('tailwindcharts/css/flowbite.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<x-sidebarkepsek></x-sidebarkepsek>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownToggle = document.querySelector('[data-collapse-toggle="dropdown-example"]');
        const dropdownMenu = document.getElementById('dropdown-example');

        dropdownToggle.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
        });
    });
</script>
</body>
</html>
