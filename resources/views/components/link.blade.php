@props(['url'=>'#'])
<a href="{{ $url }}" class="btn">
    {{ $slot }}
</a>