@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<div class="flex mt-10">
    <h1 class="text-4xl font-bold text-gray-500 mx-auto">Please answer from 0-100</h1>
</div>

<div class="container mx-auto mt-24 shadow-xl bg-gray-50">
    <form action="{{ route('createTestResult') }}" method="POST">
        @csrf
        <div class="flex flex-col">

            @foreach($questions as $question)
                <div class="my-12">
                    <div class="text-3xl text-center">{{ $question->description }}</div>
                </div>
                <div class="flex flex-col items-center justify-center mb-4">
                    <input type="range" min="0" max="100" step="1" name="sliderValues[{{ $question->id }}]"
                           class="w-72 h-4 bg-blue-200 rounded-md appearance-none"/>
                    <span class="slider-value text-sm font-bold">50</span>
                    <input type="hidden" name="questionIds[]" value="{{ $question->id }}">
                </div>
            @endforeach

            <div class="flex justify-center my-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </div>

        </div>
    </form>
</div>
<script>
    // Update the slider value display dynamically
    const sliders = document.querySelectorAll('input[type="range"]');
    sliders.forEach(slider => {
        const sliderValue = slider.parentNode.querySelector('.slider-value');
        slider.addEventListener('input', () => {
            sliderValue.textContent = slider.value;
        });
    });
</script>
