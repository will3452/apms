@props(['label'=>'', 'name'=>''])
<div class="form-group">
    <label for="">
        {{ $label }}
    </label>
    <input 
{{ $attributes->merge([
    'class'=>'form-control',
    'name'=>$name
]) }}
/>
@error($name)
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
</div>