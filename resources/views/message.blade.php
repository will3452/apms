<x-layout>
    <x-card title="Message" description="From: {{ $message->from->name }} <{{ $message->from->email }}> ,  To: {{ $message->to->name }}" >
        {{ $message->message }}
    </x-card>
    <div class="text-right">
        <a href="/write-message?reply_email={{ $message->from->email }}" class="btn btn-sm btn-primary">Reply Message</a>
    </div>
</x-layout>