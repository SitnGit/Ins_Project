@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<div class="container">
    <h1>Test Results</h1>
    <h3>User ID: {{ Auth::user()->id }}</h3>
    @foreach($testResults as $index =>$testResult)
        <div>

            <a href="{{ route('testResult.show', ['id' => $testResult->id]) }}">{{ $index + 1 }}</a>
            {{ $testResult->chars_values }}
            <hr>
        </div>
    @endforeach
</div>
