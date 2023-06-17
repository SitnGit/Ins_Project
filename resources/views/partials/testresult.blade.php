@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
@php
    use App\Models\Characteristic;
@endphp
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Test Result: {{ $testResult->created_at }}</h1>
    <div class=" p-6">
        <h3 class="text-xl font-bold">All Characteristic scores</h3>
        <div class="flex flex-col">
            @foreach(json_decode($testResult->chars_values, true) as $id => $value)
                @php
                    $characteristic = Characteristic::find($id);
                @endphp
                <div class="shadow-xl p-6 my-5 transition-transform hover:scale-105 hover:bg-gray-50 hover:text-lg">
                    <div class=""><strong>{{$characteristic->name}}:</strong> {{$value}}</div>
                    <div>{{$characteristic->description}}</div>
                </div>
            @endforeach
        </div>
        <hr class="my-4 border-gray-300">
    </div>
</div>
