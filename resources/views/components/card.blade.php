@props(['title'=>'', 'description'=>''])
<div class="card">
<div class="card-header card-header-primary">
    <h3 class="card-title">{{ $title }}</h3>
    <p class="card-category">
    {{ $description }}
    </p>
</div>
<div class="card-body">
    {{ $slot }}
</div>
</div>