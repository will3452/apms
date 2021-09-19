<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <x-card title="Welcome to {{ config('app.name') }}" description="Login">
                <form action="/login" method="POST">
                    @csrf 
                    @method("POST")
                    <x-input label="Email" type="email" name="email" required></x-input>
                    <x-input label="password" type="password" name="password" required></x-input>
                    <x-form-group>
                        <x-button-primary>Login</x-button-primary>
                        {{-- <x-link url="/enroll" >Enroll</x-link> --}}
                    </x-form-group>
                </form>
            </x-card>
        </div>
    </div>
</x-layout>