@auth
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;">{{ $slot }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <x-nav-item
                link="{{ url('/messages') }}"
                icon="mail"
            >
            @php
                $messages = auth()->user()->inMessages()->whereNull('read_at')->get();
            @endphp
                @if (count($messages))
                    <span class="badge badge-danger">{{ count($messages) }}</span>
                @endif Messages 
            </x-nav-item>

            <x-nav-item
                link="{{ url('/announcement') }}"
                icon="campaign"
            >
                Annoucement
            </x-nav-item>
            <!-- your navbar here -->
        </ul>
        </div>
    </div>
    </nav>
@endauth