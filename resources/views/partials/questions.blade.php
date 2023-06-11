@php

    use App\Models\Question;

// Create a new TestResult instance

@endphp
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
@livewireScripts
@livewire('navigation-menu')
<div class="container mx-auto mt-24">
    <div class="flex flex-col ">
        @foreach($questions as $question)
            <div class="flex my-12 justify-center">
                <div class="text-3xl">{{ $question->description }}</div>
            </div>
        @endforeach
    </div>

</div>
