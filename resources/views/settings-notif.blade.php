<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <x-sidebar></x-sidebar>
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-[#5E9EB2]">Settings</h3>
            </div>

            <!-- Tabs -->
            <div class="flex border-b border-[#5E9EB2] mb-4">
                <button class="py-2 px-4 text-[#5E9EB2]">Basic Info</button>
                <button class="py-2 px-4 text-[#5E9EB2] border-b-2 border-[#5E9EB2]">Notification</button>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
