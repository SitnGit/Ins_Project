@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<div class="container">
    <h1>Test Results</h1>
    <div>
        <h3>User ID: {{ $testResult->user_id }}</h3>
        <p>Chars Values: {{ $testResult->chars_values }}</p>
        <hr>
    </div>
</div>
