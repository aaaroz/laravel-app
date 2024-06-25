<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
</head>

<body>
    <div id="app">
        <nav class="bg-sky-800 text-white">
            <div class="container flex justify-between py-3 px-10 items-center">
                <a class="text-2xl font-semibold" href="{{ url('/') }}">
                    {{ config('app.name', 'sas') }}
                </a>
                <ul class="flex gap-4">
                    @guest
                        @if (Route::has('login'))
                            <li class="">
                                <a class="hover:text-sky-200 transition-colors duration-300"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a class="hover:text-sky-200 transition-colors duration-300"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="flex gap-x-8" >
                            <a class="text-xl hover:text-sky-200 transition-colors duration-300" href="/dashboard"
                                role="button">
                                Hi ! {{ Auth::user()->name }}
                            </a>

                            <a class="flex gap-2 items-center hover:text-sky-300 transition-colors duration-300"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <x-tabler-logout />
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-8">
            @yield('content')
        </main>
    </div>
</body>

</html>
