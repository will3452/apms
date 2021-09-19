<x-layout>
    <x-container>
        <h1>
            Record of {{ $user->name }}
        </h1>
        <x-student-insight :user="$user"></x-student-insight>
    </x-container>
</x-layout>