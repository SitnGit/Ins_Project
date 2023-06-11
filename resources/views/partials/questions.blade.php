@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<div class="container mx-auto mt-24">
    <form action="{{ route('createTestResult') }}" method="POST">
        @csrf
        <div class="flex flex-col">

            @foreach($questions as $question)
                <div class="flex my-12 justify-center">
                    <div class="text-3xl">{{ $question->description }}</div>
                </div>
                <div class="flex items-center">
                    <input type="range" min="0" max="100" step="1" name="sliderValues[{{ $question->id }}]"
                           class="w-full mr-4">
                    <span class="slider-value">0</span>
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
