<x-layout>
    <x-card-profile img="/storage/{{ $user->picture }}" title="{{ $user->name }}">
        <x-card title="Records">
            <a href="/class/{{ $user->id }}" class="btn btn-info btn-sm">
                Classes
            </a>
            <a href="/grades/{{ $user->id }}" class="btn btn-success btn-sm">
                Grades
            </a>
            <a href="/activities/?uid={{ $user->id }}" class="btn btn-warning btn-sm">
                Activities
            </a>
            <a href="/attendances?uid={{ $user->id }}" class="btn btn-dark btn-sm">
                Attendances
            </a>
             <a href="/certificates?uid={{ $user->id }}" class="btn btn-danger btn-sm">
                Certificates
            </a>
        </x-card>
    </x-card-profile>
</x-layout>