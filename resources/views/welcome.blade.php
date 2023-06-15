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

    <style>
        .mainpart {
            height: 70vh;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .mainpart img {
            max-width: 70%;
            max-height: 70%;
            margin-bottom: 20px;
        }

        .btn-group {
            margin-top: 20px;
        }

        .description {
            margin-top: 40px;
        }

        .video-container {
            width: 100%;
            height: 40vh;
            background-color: #000000;
            position: relative;
            overflow: hidden;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">
@livewireScripts


<div class="w-full">
    @if (Route::has('login'))
        <div class=" p-6 text-right">
            @auth
                {{--                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>--}}
                @livewire('navigation-menu')
            @else
                <a class="items-center text-gray-800 text-2xl font-semibold mr-6" href="{{ route('welcome') }}">Home</a>
                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
<x-banner/>

<div class="video-container">
    <video src="resources/media/video.webm" autoplay muted loop></video>
</div>

<div class="mainpart">
    <img src="logo.jpg" alt="LOGOTO TUKA">
    <h1 class="text-5xl text-cyan-700 font-bold my-12">OCEAN Personality Test</h1>
    <div class="mx-20 text-xl">
        <p>The ocean personality test is based on the five-factor model, an empirical concept in psychology that
            measures five pre-dominant personality traits: openness, conscientiousness, extroversion, agreeableness, and
            neuroticism, making the acronym OCEAN. The ocean personality assessment can be used as a tool to make
            important talent management decisions as it helps gain in-depth insights into a test-taker’s personality.

            The ocean personality test is based on the five-factor model theory that suggests five broad trait domains
            as the foundation of different personalities. The model has gone through several iterations by various
            researchers between the 1960s through the 1990s. The ocean personality test remains to be the most popular
            personality test in workplace-related situations.</p>
    </div>
</div>
<div class="mb-10">
    @if(auth()->check())
        <a href="{{ route('questions') }}"
           class="flex rounded p-4 mx-auto w-fit bg-blue-500 hover:bg-blue-700 text-white">Take The Quiz</a>
    @else
        <a href="{{ route('login') }}"
           class="flex rounded p-4 mx-auto w-fit bg-blue-500 hover:bg-blue-700 text-white">Take The Quiz</a>
    @endif
</div>
</body>
</html>
