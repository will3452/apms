<x-button {{ $attributes->merge([
     'class'=>'btn-danger'
 ]) }}>
    {{ $slot }}
</x-button>