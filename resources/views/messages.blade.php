<x-layout>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <x-card title="Messages" description="All messages goes here">
       <x-dtable class="table table-sm table-bordered table-stripped">
        <thead>
            <tr>
                <th>
                    Status
                </th>
                <th>
                    Date
                </th>
                <th>
                    Sender
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inmessages as $item)
                <tr>
                    <td>
                        @if ($item->read_at)
                            <span class="material-icons">
                                done
                            </span>
                        @else 
                            <span class="material-icons">
                                pending
                            </span>
                        @endif
                    </td>
                    <td>
                        {{ $item->created_at->diffForHumans() }}
                    </td>
                    <td>
                        {{ $item->from->name }}
                    </td>
                    <td>
                        <a href="/messages/{{ $item->id }}" class="btn btn-sm btn-primary">View Message</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </x-dtable>
    </x-card>
</x-layout>