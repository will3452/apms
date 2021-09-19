@props(['label'=>''])
@if ($slot != '')
    <div class="form-group">
        <label for="">{{ $label }}</label>
        <input type="text" value="{{ $slot }}" class="form-control" readonly>
    </div>
@endif