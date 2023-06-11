<x-app-layout>
    <div class="py-8">
        <h1 class="text-2xl font-bold mb-4">Answers</h1>
        @foreach ($testResult->dictionary as $questionId => $answer)
            <p>{{ $questions->find($questionId)->description }}: {{ $answer }}</p>
        @endforeach
    </div>
</x-app-layout>
