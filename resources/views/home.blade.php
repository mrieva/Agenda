<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html {
            scroll-behavior: smooth;
            margin: 0;
            width: 100%;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        #scrollToTopContainer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            transform: translateY(-1000px);
            /* Initially hidden above the screen */
            transition: transform 0.7s ease-in-out;
        }

        #scrollToTopContainer.show {
            transform: translateY(0);
            /* Move to visible position */
        }

        #scrollToTopBtn {
            padding: 10px 20px;
            font-size: 24px;
            background-color: transparent;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        #scrollToTopBtn:hover {
            opacity: 1;
        }

        #tombolz {
            background-color: #fff;
            color: rgb(103, 172, 197);
            border: 2px solid #ffffff;
            transition: background-color 0.4s, color 0.4s;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        #tombolz::before {
            content: "";
            background-color: rgb(103, 172, 197);
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
            color: rgb(255, 255, 255);
            border: #fff 2px solid;
            transition: 0.5s;
        }

        .navbar-nav .nav-link {
            position: relative;
            display: inline-block;
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            display: block;
            height: 2px;
            width: 0;
            background: #fff;
            transition: width 0.4s;
            bottom: 3.5px;
            left: 12.5px;
        }

        .navbar-nav .nav-link:hover::after {
            width: 80%;
            background: #fff;
        }

        #tombols {
            background-color: #fff;
            color: rgb(103, 172, 197);
            border: 2px solid rgb(255, 255, 255);
            transition: background-color 0.4s, color 0.4s;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        #tombols::before {
            content: "";
            background-color: rgb(103, 172, 197);
            position: absolute;
            top: 0;
            left: 50%;
            width: 300%;
            height: 300%;
            transition: all 0.5s;
            z-index: -1;
            transform: translateX(50%) translateY(-75%) rotate(45deg);
        }

        #tombols:hover::before {
            transform: translateX(-50%) translateY(-35%) rotate(45deg);
        }

        #tombols:hover {
            color: rgb(255, 255, 255);
            border: #fff 2px solid;
            transition: 0.5s;
        }

        #tomboll {
            background-color: #fff;
            color: rgb(103, 172, 197);
            border: 1px solid rgb(103, 172, 197);
            transition: background-color 0.4s, color 0.4s;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        #tomboll::before {
            content: "";
            background-color: rgb(103, 172, 197);
            position: absolute;
            top: 0;
            left: 50%;
            width: 600%;
            height: 600%;
            transition: all 0.6s;
            z-index: -1;
            transform: translateX(50%) translateY(-75%) rotate(45deg);
        }

        #tomboll:hover::before {
            transform: translateX(-50%) translateY(-35%) rotate(45deg);
        }

        #tomboll:hover {
            color: #fff;
            border: rgb(103, 172, 197) 1px solid;
            transition: 0.2s all;
        }
    </style>
</head>

<body class="m-0 font-poppins bg-cover bg-center bg-no-repeat">

    <x-navbar />

    <main>
        <section id="hero" class="h-screen bg-no-repeat bg-cover bg-right-top"
            style="background-image: url('{{ asset('img/bg.jpeg') }}');">
            <div class="container lg:px-20 py-16 mx-auto lg:h-full">
                <div class="flex flex-wrap items-center justify-center h-full w-full lg:mt-[7%]">
                    <div class="basis-full lg:basis-1/2 flex md:h-full items-center">
                        <div class="text-left p-5 bg-opacity-70 ml-[17%] lg:text-start md:text-center sm:text-center">
                            <h1 class="text-4xl lg:text-8xl text-[#ffffff] m-0 font-extrabold tracking-wide ">EduNote.
                            </h1>
                            <p class="text-2xl text-[#ffffff] m-0">Indonesia Maju Dengan<br>Generasi Baru!</p>
                            <a id="tombolz" href="#"
                                class="inline-block mt-5 px-10 py-2 text-blue-300 bg-transparent border border-white rounded-md text-xl transition-colors duration-300 ease-in-out">
                                Get Started
                            </a>
                        </div>
                    </div>
                    <div class="basis-full lg:basis-1/2 relative md:h-full">
                        <div class="relative md:h-full left-[55px]">
                            <img src="{{ asset('img/elipse.png') }}" alt="elipse" class="absolute z-10 w-[600px]">
                            <img src="{{ asset('img/ketua.png') }}" alt="ketua"
                                class="absolute z-20 w-[450px] left-[90px] top-[25px]">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-About />

        <x-Footer />

        <div id="scrollToTopContainer">
            <button id="scrollToTopBtn">
                <img src="{{ asset('img/roket.png') }}" width="90%" alt="rocket">
            </button>
        </div>
    </main>

    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollToTopContainer = document.getElementById('scrollToTopContainer');
            const scrollToTopBtn = document.getElementById('scrollToTopBtn');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    scrollToTopContainer.classList.add('show');
                } else {
                    scrollToTopContainer.classList.remove('show');
                }
            });

            scrollToTopBtn.addEventListener('click', function() {
                // Add animation to hide the button
                scrollToTopContainer.classList.remove('show');
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 0) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

</body>

</html>
