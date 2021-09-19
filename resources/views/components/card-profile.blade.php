@props(['img'=>'', 'category'=>'', 'title'=>''])
<div class="card card-profile">
<div class="card-avatar">
    <a href="javascript:;">
    <img class="img" src="{{ $img }}" />
    </a>
</div>
<div class="card-body">
    <h6 class="card-category text-gray">{{ $category }}</h6>
    <h4 class="card-title">{{ $title }}</h4>
    <p class="card-description">
        {{ $slot }}
    </p>
</div>
</div>