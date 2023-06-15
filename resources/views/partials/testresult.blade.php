@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Test Result</h1>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-bold">User ID: {{ $testResult->user_id }}</h3>
        <p class="mt-2">Chars Values: {{ $testResult->chars_values }}</p>
        <hr class="my-4 border-gray-300">
    </div>
</div>
