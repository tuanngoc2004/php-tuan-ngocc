<div class="form-group">
    <div class="form-check">
        <input type="checkbox" class="form-check-input {{ $inputClass }}" id="{{ $id }}" name="{{ $name }}" {{ $attributes }}>
        <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
    </div>
</div>

{{-- <div class="form-group">
    <div class="form-check">
        @include('atoms.TextInput', ['id' => $id, 'name' => $name, 'class' => $inputClass, 'value' => $value])
        @include('atoms.Label', ['for' => $id, 'text' => $label, 'class' => 'form-check-label'])
    </div>
</div> --}}


