@props(['url'=>'#'])
<li class="nav-item dropdown">
    <a href="{{ $url }}" class="nav-link">
        <button class="btn text-white"
        @if (url()->current() == url($url))
            style="border-bottom:2px solid red;"
        @else 
            style=""
        @endif
        >
            {{ $slot }}
        </button>
    </a>
</li>