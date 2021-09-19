<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
               <x-card title="login">
                   <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="">EMAIL</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">
                                PASSWORD
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <x-button>
                            LOGIN
                        </x-button>
                    </form>
               </x-card>
            </div>
        </div>
    </div>
</x-layout>