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
                        Welcome Back, {{ $user->name }}!</h3>
                    <p class="text-sm text-[#83a4ad] dark:text-gray-300">Di sini Anda dapat melihat data kehadiran
                        seluruh warga sekolah</p>
                </div>
                <div
                    class="flex items-center justify-end h-24 rounded bg-transparent dark:bg-gray-800 p-4 space-x-4">
                    <div class="flex items-center space-x-4 cursor-pointer" onclick="window.location.href='{{ route('settings-kepsek') }}'">
                        <img src="{{ asset('storage/' . $user->profile_picture) }}"
                            class="w-10 h-10 rounded-full object-cover" alt="">
                        <div>
                            <p class="text-xs font-bold text-[#5E9EB2] dark:text-gray-500">{{ $user->name }}</p>
                            <p class="text-xs text-[#83a4ad] dark:text-gray-300">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-16 mb-4 mx-10">
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
