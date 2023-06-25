<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite('resources/js/app.js')
    <!-- Styles -->




    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased bg-opacity-50"
      style="background-image: url('{{@asset('media/back.jpg')}}');">
@livewireScripts


{{--<div class="w-full">--}}

{{--    @if (Route::has('login'))--}}
{{--        <div class="grid grid-cols-5 justify-end p-6 text-right">--}}
{{--            @auth--}}
{{--                --}}{{--                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>--}}
{{--                @livewire('navigation-menu')--}}
{{--            @else--}}
{{--                <h1 class="inline justify-self-start text-5xl text-cyan-700 font-bold">OCEAN--}}
{{--                    Personality--}}
{{--                    Test</h1>--}}
{{--                <a class="items-center text-gray-800 text-2xl font-semibold mr-6" href="{{ route('welcome') }}">Home</a>--}}
{{--                <a href="{{ route('login') }}"--}}
{{--                   class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log--}}
{{--                    in</a>--}}

{{--                @if (Route::has('register'))--}}
{{--                    <a href="{{ route('register') }}"--}}
{{--                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>--}}
{{--                @endif--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}
@if (Route::has('login'))
    @auth
        @livewire('navigation-menu')
    @else
        <nav class="bg-gray-100">
            <div class="container mx-auto flex items-center justify-between py-4">
                <a class="text-5xl text-cyan-700 font-bold" href="{{ route('welcome') }}">OCEAN Personality Test</a>
                <div class="ml-auto">
                    <ul class="flex items-center space-x-4">
                        <li class="nav-item active">
                            <a href="{{ route('login') }}"
                               class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                in</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    @endauth
@endif

<x-banner/>


<div class="mainpart relative">
    <div class="video-container relative">
        <video class="opacity-90" src="{{@asset('media/video.webm')}}" autoplay muted loop></video>
        <h1 class="absolute top-1/2 left-1/2 mx-auto flex justify-center text-5xl text-cyan-700 font-bold my-12">
            Welcome...</h1>
    </div>
    <div class="grid grid-cols-2">
        <div class="flex justify-center items-center p-4"><img class="w-[753px] h-[282px]"
                                                               src="{{@asset("media/logo.png")}}"
                                                               alt="LOGO">
        </div>


        <div class="flex items-center align-middle text-justify mx-20 my-10 text-xl">
            <p>The ocean personality test is based on the five-factor model, an empirical concept in psychology that
                measures five pre-dominant personality traits: openness, conscientiousness, extroversion, agreeableness,
                and
                neuroticism, making the acronym OCEAN. The ocean personality assessment can be used as a tool to make
                important talent management decisions as it helps gain in-depth insights into a test-taker’s
                personality.

                The ocean personality test is based on the five-factor model theory that suggests five broad trait
                domains
                as the foundation of different personalities. The model has gone through several iterations by various
                researchers between the 1960s through the 1990s. The ocean personality test remains to be the most
                popular
                personality test in workplace-related situations.
            </p>

        </div>
    </div>
</div>
<div class="flex justify-center text-2xl font-semibold text-cyan-600 my-12 mx-20">In this test, you will be tested on 2
    characteristics
    from every
    of the
    5 traits in total 10 characteristics.
</div>
<div class="mb-10">
    @if(auth()->check())
        <a href="{{ route('questions') }}"
           class="flex rounded-full p-4 px-10 mx-auto w-fit bg-blue-500 hover:bg-blue-700 text-white text-xl">Take The
            Quiz</a>
    @else
        <a href="{{ route('login') }}"
           class="flex rounded-full p-4 px-10 mx-auto w-fit bg-blue-500 hover:bg-blue-700 text-white text-xl">Take The
            Quiz</a>
    @endif
</div>
</body>
</html>
