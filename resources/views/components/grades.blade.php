@props(['user',])
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div>Latest Grades</div>
        <div>
            Total Average: {{$user->latest_grades_average}}
        </div>
    </div>
    <div class="card-body">
        <canvas id="grades"></canvas>
    </div>
    <script>


        const labels = [
            '1',
            '2',
            '3',
            '4',
            ];
            const data = {
            labels: labels,
            datasets: [
                @foreach($user->latest_grades as $key=>$items)
                {
                    label: `{{\App\Models\Subject::find($key)->name}}`,
                    backgroundColor: '#{{dechex(rand(0,10000000))}}',
                    borderColor: '#{{dechex(rand(0,10000000))}}',
                    data: [
                        @foreach($items as $item)
                            {{$item->value}},
                        @endforeach
                    ],
                },
                @endforeach
            ]
            };

            const config = {
            type: 'bar',
            data: data,
            options: {}
        };
        const myChart = new Chart(
                document.getElementById('grades'),
                config
            );
    </script>
</div>
