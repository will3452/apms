<x-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <x-card title="Write new message">
        <form action="/send-message" method="POST">
            @csrf 
            @method('PUT')
            <x-form-group>
                <label for="e">Receipient Email</label>
                <input type="email" autofocus id="e" value="{{ request()->reply_email??'' }}" name="email" required class="form-control" placeholder="myteacher@email.com">
                <small class="text-help">Email must be registered to the {{ config('app.name') }}.</small>
            </x-form-group>
            <x-form-group>
                <label for="">Message</label>
                <textarea name="message" id="" requried class="form-control" placeholder="Aa">{{ old('message') }}</textarea>
            </x-form-group>
            <x-form-group class="text-right">
                <button class="btn btn-primary">
                    Send
                </button>
            </x-form-group>
        </form>
    </x-card>
    <x-card title="All message sent">
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
                    Receipient
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outmessages as $item)
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
                        {{ $item->to->name }}
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