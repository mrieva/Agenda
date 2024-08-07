<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
    <style>
        #tombolpost {
            background-color: transparent;
            color: #58A1C0;
            border: 2px solid #58A1C0;
            transition: background-color 0.4s, color 0.4s;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        #tombolpost::before {
            content: "";
            background-color: #58A1C0;
            position: absolute;
            top: 0;
            left: 50%;
            width: 700%;
            height: 700%;
            transition: all 0.6s;
            z-index: -1;
            transform: translateX(50%) translateY(-75%) rotate(45deg);
        }

        #tombolpost:hover::before {
            transform: translateX(-50%) translateY(-35%) rotate(45deg);
        }

        #tombolpost:hover {
            color: #fff;
            border: #58A1C0 2px solid;
            transition: 0.7s ease-in-out;
        }
    </style>
</head>

<body>
 <!-- Footer Section -->
<footer class="bg-gray-100 py-8border-t border-gray-200" id="contact">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-8 gap-7  pt-9 ml-[190px]">
            <!-- Section 1 -->
            <div class="flex flex-col">
                <h3 class="text-lg font-bold text-[#58A1C0] mb-1">Lorem</h3>
                <p class="text-sm text-gray-500 mb-2 max-w-[150px]">Lorem ipsum dolor sit amet consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <p class="text-sm text-gray-500 max-w-[150px]">Lorem ipsum dolor sit amet sitil amet ipsum</p>
            </div>
            <!-- Section 2 -->
            <div class="flex flex-col">
                <h3 class="text-lg font-bold text-[#58A1C0] mb-1">Lorem</h3>
                <p class="text-sm text-gray-500 mb-2 max-w-[150px]">Lorem ipsum dolor sit amet consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <p class="text-sm text-gray-500 max-w-[150px]">Lorem ipsum dolor sit amet sitil amet ipsum</p>
            </div>
            <!-- Section 3 -->
            <div class="flex flex-col">
                <h3 class="text-lg font-bold text-[#58A1C0] mb-1">Contact</h3>
                <p class="text-sm text-gray-500 mb-2 max-w-[150px]">Lorem ipsum dolor sit amet consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <!-- Section 4 -->
            <div class="flex flex-col">
                <h3 class="text-lg font-bold text-[#58A1C0] mb-1">Subscribe</h3>
                <p class="text-sm text-gray-500 mb-4 max-w-[150px]">Lorem ipsum dolor sit amet consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <p class="text-sm text-gray-500 mb-4 max-w-[150px]">Lorem ipsum dolor sit amet consectetur
                    adipiscing elit.</p>
            </div>
            <!-- Kirim email Section -->
            <div class="flex flex-col absolute right-[60px]">
                <h3 class="text-lg font-bold text-[#58A1C0] mb-1">Kotak Saran : &#41;</h3>
                <form id="contactForm" action="{{ route('send.email') }}" method="POST">
                    @csrf
                    <input type="text" name="from"
                        class="w-[70%] p-2 border border-gray-300 rounded-md text-sm mb-2" placeholder="From">
                    <input type="text" name="message"
                        class="w-[70%] p-2 border border-gray-300 rounded-md text-sm mb-4" placeholder="Message">
                    <button class="w-[70%] p-2 bg-[#58A1C0] text-white rounded-md" id="tombolpost"
                        type="submit">Send</button>
                </form>
            </div>
            <!-- Social Media Section -->
            <div class="flex flex-col absolute right-[280px] mt-[205px]">
                <div class="flex space-x-4 mb-4">
                    <a href="#" class="text-[#58A1C0]"><i class="fab fa-instagram text-4xl"></i></a>
                    <a href="#" class="text-[#58A1C0]"><i class="fab fa-twitter text-4xl"></i></a>
                    <a href="#" class="text-[#58A1C0]"><i class="fab fa-facebook text-4xl"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="bg-[#335e70] py-4 mt-8">
        <div class="container mx-auto text-center">
            <p class="text-sm text-gray-50">&copy; 2024 SARA TEAM - SMKN 1 BANJAR. All rights reserved.</p>
        </div>
    </div>
</footer>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#contactForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Email telah dikirim!');
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>
</body>

</html>
