@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
@php
    use App\Models\Characteristic;
@endphp
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Test Result: {{ $testResult->created_at }}</h1>
    <div class="w-[500px] h-[500px] mx-auto">
        <canvas id="spider-chart" width="200" height="200"></canvas>
    </div>
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
@php
    $characteristicNames = [];
    $scores = [];

    foreach (json_decode($testResult->chars_values, true) as $charId => $score) {
        $characteristicNames[] = Characteristic::find($charId)->name;
        $scores[] = $score;
    }
@endphp
<script>
    var characteristicNames = @json($characteristicNames);
    var scores = @json($scores);
    var ctx = document.getElementById('spider-chart').getContext('2d');

    new Chart(ctx, {
        type: 'radar',
        data: {
            labels: characteristicNames,
            datasets: [{
                label: 'Scores',
                data: scores,
                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Adjust the background color and opacity
                borderColor: 'rgba(75, 192, 192, 1)',
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        },
        options: {
            scale: {
                ticks: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

</script>
