<x-layout>
    <x-card title="Announcments" description="View and be update to the announcements!">
        @foreach ($announcements as $item)
            <div class="alert" style="border-bottom:2px solid #ddd;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons" style="color:#222;">close</i>
                </button>
                <span><strong>{{ $item->title }}</strong> <br> - {{ $item->content }} <br><small>{{ $item->created_at->diffForHumans() }}</small></span>
            </div>
        @endforeach
    </x-card>
</x-layout>