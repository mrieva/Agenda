<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KepalaSekolah</title>
    <link href="{{ asset('tailwindcharts/css/flowbite.min.css') }}" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });

        function drawChart(timeFilter) {
            fetch(`{{ route('kehadiran.chart') }}?time_filter=${timeFilter}`)
                .then(response => response.json())
                .then(data => {
                    var dataGuru = google.visualization.arrayToDataTable([
                        ['Keterangan', 'Jumlah'],
                        ['Hadir', data.guru.find(item => item.keterangan === 'hadir')?.jumlah || 0],
                        ['Izin', data.guru.find(item => item.keterangan === 'izin')?.jumlah || 0],
                        ['Sakit', data.guru.find(item => item.keterangan === 'sakit')?.jumlah || 0]
                    ]);

                    var optionsGuru = {
                        title: 'Grafik Kehadiran Guru',
                    };

                    var chartGuru = new google.visualization.PieChart(document.getElementById('donut_single'));
                    chartGuru.draw(dataGuru, optionsGuru);

                    var dataSiswa = google.visualization.arrayToDataTable([
                        ['Keterangan', 'Jumlah'],
                        ['Hadir', data.siswa.find(item => item.keterangan === 'hadir')?.jumlah || 0],
                        ['Izin', data.siswa.find(item => item.keterangan === 'izin')?.jumlah || 0],
                        ['Sakit', data.siswa.find(item => item.keterangan === 'sakit')?.jumlah || 0]
                    ]);

                    var optionsSiswa = {
                        title: 'Grafik Kehadiran Siswa',
                    };

                    var chartSiswa = new google.visualization.PieChart(document.getElementById('donut_single2'));
                    chartSiswa.draw(dataSiswa, optionsSiswa);
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        document.addEventListener('DOMContentLoaded', function() {
            google.charts.setOnLoadCallback(() => drawChart('today')); // Default filter

            const timeFilterDropdown = document.getElementById('timeFilter');
            timeFilterDropdown.addEventListener('change', function() {
                const timeFilter = this.value;
                drawChart(timeFilter);
            });
        });
    </script>
    @vite('resources/css/app.css')
</head>

<body>
    <x-sidebarkepsek></x-sidebarkepsek>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div
                class="grid grid-cols-1 md:grid-cols-1 sm:grid-cols-1 xs:grid-cols-1 xss:grid-cols-1 lg:grid-cols-2 gap-4 mb-4 mx-6">
                <div class="items-center justify-center h-24 rounded bg-transparent dark:bg-gray-800 block p-4">
                    <h3
                        class="xl:text-3xl lg:text-2xl md:text-xl xss:text-sm font-bold text-[#5E9EB2] dark:text-gray-500">
                        Welcome Back, Kepala Sekolah!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Dolorem ipsum!</p>
                </div>
                <div
                    class="flex items-center lg:justify-end xs:justify-center xss:justify-center h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <form class="relative flex items-center">
                        <input type="text" placeholder="Search..."
                            class="bg-[#5e9eb234] dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-xl lg:px-10 lg:py-2 focus:outline-none focus:ring-2 focus:ring-[#5E9EB2]">
                        <i
                            class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 dark:text-gray-500'></i>
                    </form>
                    <button onclick="window.location.href='{{ route('settings-kepsek') }}'"
                        class="flex items-center justify-center lg:w-10 lg:h-10 bg-[#5e9eb234] dark:bg-gray-700 rounded-lg">
                        <i class='bx bx-user text-gray-600 dark:text-gray-300'></i>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-16 mb-4 mx-10">
                <div
                    class="flex items-end justify-end h-[293px] max-w-full rounded-3xl bg-gradient-to-b from-[#5E9EB2] to-[#6CC6EC]">
                    <div class="image-wrapper">
                        <img src="{{ asset('img/guru.png') }}" class="w-[50%] ml-[30%]" alt="kepsek-icon">
                    </div>
                </div>
                <div class="border-4 border-solid border-[#5E9EB2] rounded-xl">
                    <div class="container">
                        <div class="text-wrapper flex px-14 py-14 items-center justify-between mb-5">
                            <h1 class="text-3xl font-bold text-[#5E9EB2] mr-4">Piechart</h1>
                            <div class="flex items-center space-x-4">
                                <label for="timeFilter" class="text-sm font-semibold text-[#5E9EB2]">Filter:</label>
                                <select id="timeFilter"
                                    class="px-5 py-1 text-sm font-semibold text-[#5E9EB2] bg-white border-2 border-[#5E9EB2] rounded-full">
                                    <option value="today">Today</option>
                                    <option value="7days">7 Days</option>
                                    <option value="month">This Month</option>
                                    <option value="year">This Year</option>
                                    <option value="all">All Time</option> <!-- New option added -->
                                </select>

                            </div>
                        </div>
                        <div class="flex flex-row justify-evenly chart-wrapper">
                            <div id="donut_single" class="w-[500px] h-[400px]"></div>
                            <div id="donut_single2" class="w-[500px] h-[400px]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.querySelector('[data-collapse-toggle="dropdown-example"]');
            const dropdownMenu = document.getElementById('dropdown-example');
            dropdownToggle.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>
