<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('script.js') }}"></script>
</head>

<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="/"
                            class="@if (request()->is('/')) bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium @else text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium @endif">Home</a>
                        @if (auth()->user()->role != 'Shelter')
                            <a href="/pets"
                                class="@if (request()->is('pets')) bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium @else text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium @endif">Pets</a>
                            <a href="/wishlist"
                                class="@if (request()->is('wishlist')) bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium @else text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium @endif">Wishlist</a>
                        @else
                            <a href="/requests"
                                class="@if (request()->is('requests')) bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium @else text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium @endif">Adoption
                                Requests</a>
                            <a href="/newadoption"
                                class="@if (request()->is('newadoption')) bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium @else text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium @endif">Create Adoption</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <a href="/messenger"
                    class="relative mr-2 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View conversations</span>
                    <svg class="h-6 w-6" width="221" height="220" viewBox="0 0 221 220" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M141.969 129.665L172.003 86.5501C174.975 82.3036 169.338 77.6875 165.033 80.7341L132.641 102.892C131.577 103.61 130.281 103.999 128.951 103.999C127.62 103.999 126.325 103.61 125.261 102.892L101.275 86.6425C94.0995 81.842 83.8488 83.5961 79.0311 90.3352L48.9972 133.45C46.0246 137.697 51.6623 142.312 55.9675 139.265L88.3592 117.108C89.4234 116.39 90.7188 116 92.0493 116C93.3799 116 94.6753 116.39 95.7395 117.108L119.725 133.08C126.9 138.158 137.151 136.404 141.969 129.665Z"
                            fill="#929AA3" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M110.5 0C49.4725 0 1.52588e-05 48.0174 1.52588e-05 107.25C1.52588e-05 137.666 13.0553 165.133 34 184.641V211.75C34 214.402 35.3134 216.892 37.53 218.442C39.7465 219.993 42.5959 220.416 45.1879 219.576L76.6908 209.385C87.3564 212.708 98.7201 214.5 110.5 214.5C171.528 214.5 221 166.483 221 107.25C221 48.0174 171.528 0 110.5 0ZM17 107.25C17 57.1301 58.8614 16.5 110.5 16.5C162.138 16.5 204 57.1301 204 107.25C204 157.369 162.138 198 110.5 198C99.6257 198 89.2013 196.201 79.516 192.901C77.7372 192.294 75.801 192.28 74.0124 192.858L51 200.303V181.041C51 178.695 49.9704 176.458 48.1688 174.894C29.0267 158.266 17 134.126 17 107.25Z"
                            fill="#929AA3" />
                    </svg>
                </a>

                <button type="button"
                    class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>

                <div class="relative ml-3">
                    <div id="dropdown-btn">
                        <button type="button"
                            class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full object-cover"
                                src="{{ Storage::url(auth()->user()->profileImage) }}" alt="profile">
                        </button>
                    </div>

                    <div id="dropdown-modal"
                        class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Your Profile</a>
                        @if (auth()->user()->role != 'Shelter')
                            <a href="/history" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">Adoption History</a>
                        @endif
                        <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                            tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<body class="bg-[#CDD1E4]">
    @yield('content')
</body>

</html>
