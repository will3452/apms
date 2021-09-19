<x-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <x-card title="attendances">
        <x-dtable class="table table-bordered">
            <thead>
                <th>
                    Date
                </th>
                <th>
                    Teacher
                </th>
                <th>
                    Subject
                </th>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>
                            {{ $attendance->created_at->format('m/d/y H:i s') }}
                        </td>
                        <td>
                            {{ $attendance->teacher->name }}
                        </td>
                        <td>
                            {{ $attendance->subject->name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-dtable>
    </x-card>
    
</x-layout>