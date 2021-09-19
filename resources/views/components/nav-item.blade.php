@props(['icon'=>'', 'link'=>'#'])
<li class="nav-item {{  url()->current() != $link?:'active' }}">
    <a class="nav-link d-flex justify-content-between" href="{{ $link }}">
        <i class="material-icons">{{ $icon }}</i>
        <span>{{ $slot }}</span>
    </a>
</li>