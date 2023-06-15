@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<div class="flex mt-10">
    <h1 class="text-4xl mx-auto">All previous results</h1>
</div>
<div class="container mx-auto px-4 py-8">
    <h3 class="text-lg font-bold">User ID: {{ Auth::user()->id }}</h3>

    @foreach($testResults as $index => $testResult)
        <a href="{{ route('testResult.show', ['id' => $testResult->id]) }}"
           class="block bg-white rounded-lg shadow-md my-3 transform transition-transform hover:scale-105 hover:bg-gray-100 hover:shadow-lg">
            <div class="p-6 flex">
                <div class="text-2xl">{{ $index + 1 }}</div>
                <div class="ml-2">{{ $testResult->created_at }}</div>
                <hr class="my-2">
            </div>
        </a>

    @endforeach
</div>
