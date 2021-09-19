<x-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <div class="row">
        <div class="col-md-8">
            <x-card title="Class details: {{ $class->name }}">
                <table class="table">
                    <tr>
                        <td>
                            About
                        </td>
                        <td>
                            {!! $class->description !!}
                        </td>
                    </tr>
                </table>
            </x-card>
        </div>
        <div class="col-md-4">
            <x-card-profile
            category="Adviser" 
            title="{{ $class->teacher->name }}" img="/storage/{{ $class->teacher->picture }}">
            </x-card-profile>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <x-card title="Class Schedules" description="Class subjects are listed below!">
                <x-dtable class="table">
                    <thead>
                        <th>
                            Subject
                        </th>
                        <th>
                            Time
                        </th>
                        <th>
                            Day
                        </th>
                        <th>
                            Teacher
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($class->schedules  as $item)
                            <tr>
                                <td>
                                    {{ $item->subject->name }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->start_time)->format('h:s a').' - '.\Carbon\Carbon::parse($item->end_time)->format('h:s a') }}
                                </td>
                                <td class="text-uppercase">
                                    {{ $item->day }}
                                </td>
                                <td>
                                    {{ $item->teacher->name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-dtable>
            </x-card>
        </div>
    </div>
</x-layout>