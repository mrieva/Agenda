<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
    class="inline-flex items-center my-6 p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gradient-to-b from-blue-200 via-white to-blue-800"
    aria-label="Sidebar">
    <div
        class="h-full px-3 py-4 overflow-x-auto bg-gradient-to-l from-[#3D7086] from-[-40%] to-[#6CC6EC] to-80% rounded">
        <a href="#" class="flex items-center justify-center lg:py-4 lg:mb-6 md:mb-6 sm:mb-4 xs:mb-8 xss:mb-8">
            <img src="{{ asset('img/logo.png') }}" class="lg:h-24 md:h-20 xs:h-16 xss:h-12" alt="Edunote Logo" />
        </a>
        <ul class="space-y-2 font-medium">
            <li>
                <p class="text-sm font-bold text-[#ffffff] mb-1 p-2 opacity-70">Menu</p>
            </li>
            <li>
                <a href="{{ route('index-kepala-sekolah') }}"
                    class="flex items-center my-6 p-2 text-[#ffffff] rounded-lg dark:text-white hover:bg-[#fff] hover:bg-opacity-40 hover:z-0 hover:text-[#fff] dark:hover:bg-gray-700 group relative
                    {{ request()->routeIs('index-kepala-sekolah') ? 'bg-gray-100 bg-opacity-40 text-[#fff] dark:bg-gray-700' : '' }}">
                    <svg class="absolute w-5 h-5 text-gray-500 transition duration-75 dark:text-[#ffffff] group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <img src="{{ asset('img/icon/dashboard.png') }}" width="25" height="25"
                            alt="home icon" />
                    </svg>
                    <span class="ms-3 z-10">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full my-6 p-2 text-base text-[#ffffff] transition duration-75 rounded-lg group hover:bg-gray-100 hover:bg-opacity-40 dark:text-white dark:hover:bg-gray-700 {{ request()->is('settings-kepsek') ? 'bg-gray-100 bg-opacity-40 text-[#fff] dark:bg-gray-700' : '' }}
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <a href="{{ route('settings-kepsek') }}" class="flex items-center w-full">
                        <svg class="absolute flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 21">
                            <img src="{{ asset('img/icon/settings.png') }}" width="25" height="25"
                                alt="">
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Settings</span>
                    </a>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-[#fff] transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:bg-opacity-40 dark:text-white dark:hover:bg-gray-700">Light
                            Mode</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-[#fff] transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 hover:bg-opacity-40 dark:text-white dark:hover:bg-gray-700">Dark
                            Mode</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"
                    class="flex items-center my-6 p-2 text-[#ffffff] rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 hover:bg-opacity-40 group">
                    <svg class="absolute flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <img src="{{ asset('img/icon/logout.png') }}" width="25" height="25" alt="">
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
