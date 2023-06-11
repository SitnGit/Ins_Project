<div class="container">
    <h1>Test Results</h1>
    @foreach($testResults as $result)
        <div>
            <h3>User ID: {{ $result->user_id }}</h3>
            <p>Chars Values: {{ $result->chars_values }}</p>
            <hr>
        </div>
    @endforeach
</div>
