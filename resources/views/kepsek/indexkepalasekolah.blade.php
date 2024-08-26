<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kepala Sekolah</title>
    <link href="{{ asset('tailwindcharts/css/flowbite.min.css') }}" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Data and options (same as before)
            var data1 = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Hadir', 80],
                ['Tanpa Keterangan', 10],
                ['Izin', 10],
                ['Sakit', 7],
            ]);

            var options1 = {
                title: 'Grafik Kehadiran Guru',
            };

            var chart1 = new google.visualization.PieChart(document.getElementById('donut_single'));
            chart1.draw(data1, options1);

            // Manipulate CSS directly after drawing the chart
            var titleElement1 = document.querySelector('#donut_single svg text');
            if (titleElement1) {
                titleElement1.style.fontSize = '24px'; // Ubah ukuran font
                titleElement1.style.fill = '#5E9EB2'; // Ubah warna teks
                titleElement1.style.textAlign = 'center';
                titleElement1.style.fontWeight = 'bold'; // Ubah ketebalan teks
            }

            // Data and options for the second chart (same as before)
            var data2 = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Hadir', 1000],
                ['Tanpa Keterangan', 10],
                ['Izin', 23],
                ['Sakit', 50]
            ]);

            var options2 = {
                title: 'Grafik Kehadiran Siswa',
            };

            var chart2 = new google.visualization.PieChart(document.getElementById('donut_single2'));
            chart2.draw(data2, options2);

            // Manipulate CSS directly for the second chart
            var titleElement2 = document.querySelector('#donut_single2 svg text');
            if (titleElement2) {
                titleElement2.style.fontSize = '24px'; // Ubah ukuran font
                titleElement2.style.fill = '#5E9EB2'; // Ubah warna teks
                titleElement2.style.fontWeight = 'bold'; // Ubah ketebalan teks
            }
        }
    </script>
    @vite('resources/css/app.css')
</head>

<body>
    <x-sidebarkepsek></x-sidebarkepsek>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div
                class="grid grid-cols-1 md:grid-cols-1 sm:grid-cols-1 xs:grid-cols-1 xss:grid-cols-1 lg:grid-cols-2 gap-4 mb-4 mx-6">
                <!-- Left Section (Welcome Text) -->
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3
                        class="xl:text-3xl lg:text-2xl md:text-xl xss:text-sm font-bold text-[#5E9EB2] dark:text-gray-500">
                        Welcome Back, Kepala Sekolah!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Dolorem ipsum!</p>
                </div>

                <!-- Right Section (Search, Profile, Notifications) -->
                <div
                    class="flex items-center lg:justify-end xs:justify-center xss:justify-center h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <!-- Search Form -->
                    <form class="relative flex items-center">
                        <input type="text" placeholder="Search..."
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500'></i>
                    </form>

                    <!-- Profile Button -->
                    <button
                        onclick="window.location.href='{{ route('settings-kepsek') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>

                    <!-- Notification Button -->
                    <button
                        onclick="window.location.href='{{ route('notifkepsek') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 md:w-8 md:h-8 sm:w-8 sm:h-8 xs:w-8 xs:h-8 xss:w-8 xss:h-8 bg-[#5e9eb234] dark:bg-gray-700 xl:rounded-lg lg:rounded-xl md:rounded-lg sm:rounded-lg xs:rounded-lg xss:rounded-lg">
                        <i class='bx bx-bell text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-16 mb-4 mx-10">
                <!-- DIATAS GATAU NAMANYA -->
                <div
                    class="flex items-end justify-end h-[293px] max-w-full rounded-3xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
                    <div class="image-wrapper">
                        <img src="{{ asset('img/guru.png') }}" class="w-[50%] ml-[30%]" alt="kepsek-icon">
                    </div>
                </div>

                <!-- Pie Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 chart-wrapper">
                    <div id="donut_single" class="w-[500px] h-[400px]"></div>
                    <div id="donut_single2" class="w-[500px] h-[400px]"></div>
                </div>

            </div>

        </div>
    </div>

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
