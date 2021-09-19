<x-layout>
    <x-card title="Certificates">
        <x-dtable class="table table-sm">
            <thead>
                <tr>
                    <th>
                        Date
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificates as $item)
                    <tr>
                        <td>
                            {{ $item->created_at->format('M d, Y') }}
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td>
                            <a href="/storage/{{ $item->certificate }}" download>Download</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-dtable>
    </x-card>
</x-layout>