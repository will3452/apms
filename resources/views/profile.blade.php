<x-layout>
    <x-container>
        <x-card title="Profile">
            <x-row>
                <x-col class="col-md-3 col-12">
                    <img src="/storage/{{ $user->picture }}" alt="" class="img-fluid">
                </x-col>
                <x-col class="col-md-9 col-12">
                    <form action="/profile/{{ $user->id }}" method="POST">
                        @csrf 
                        @method('PUT')
                        <x-readonly label="Name">{{ $user->name }}</x-readonly>
                        <x-readonly label="LRN">{{ $user->lrn }}</x-readonly>
                        <x-readonly label="Address">{{ $user->address }}</x-readonly>
                        <x-readonly label="Gender">{{ $user->gender }}</x-readonly>
                        <x-readonly label="Email">{{ $user->email }}</x-readonly>
                        @if ($user->id == auth()->id())
                            <div class="form-group">
                                <label for="">Contact No.</label>
                                <input type="text" class="form-control" value="{{ $user->contact_no }}" required name="contact_no">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" value="" required class="form-control">
                            </div>
                            <x-button>Save changes</x-button>
                        @else 
                            <x-readonly label="Contact No.">{{ $user->contact_no }}</x-readonly>
                        @endif
                    </form>
                </x-col>
            </x-row>
        </x-card>
    </x-container>
</x-layout>