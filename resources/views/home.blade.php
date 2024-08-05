<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <style>
        #tombolz {
        background-color: transparent;
        color: #ffffff;
        border: 2px solid #ffffff;
        transition: background-color 0.4s, color 0.4s;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    #tombolz::before {
        content: "";
        background-color: #fff;
        position: absolute;
        top: 0;
        left: 50%;
        width: 400%;
        height: 400%;
        transition: all 0.5s;
        z-index: -1;
        transform: translateX(50%) translateY(-75%) rotate(45deg);
    }

    #tombolz:hover::before {
        transform: translateX(-50%) translateY(-35%) rotate(45deg);
    }

    #tombolz:hover {
        color: rgb(103, 172, 197);
        border: #fff 2px solid;
        transition: 0.5s
    }
    </style>
</head>

<body class="m-0 font-poppins bg-cover bg-center bg-no-repeat h-screen"
    style="background-image: url('{{ asset('img/bg.jpeg') }}');">

    <x-navbar />

    <main class="pt-20">
        <div class="relative flex items-center justify-center h-screen">
            <div class="absolute top-[135px] left-[195px] text-left p-5 bg-opacity-70">
                <h1 class="text-8xl text-[#ffffff] m-0 font-extrabold tracking-wide">EduNote.</h1>
                <p class="text-2xl text-[#ffffff] m-0">Indonesia Maju Dengan<br>Generasi Baru!</p>
                <a id="tombolz" href="#"
                    class="inline-block mt-5 px-10 py-2 text-blue-300 bg-transparent border border-white rounded-md text-xl transition-colors duration-300 ease-in-out">
                    Get Started
                </a>
            </div>
            <div class="absolute ml-96 top-5 z-0">
                <img src="{{ asset('img/elipse.png') }}" alt="elipse" class="z-10 relative left-32 bottom-16"
                    width="655">
                <img src="{{ asset('img/ketua.png') }}" alt="ketua" class="absolute z-20 top-[-10px] left-[255px]"
                    width="465">
            </div>
        </div>
    </main>
</body>

</html>
