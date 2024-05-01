<div class="form-group">
    <x-atoms.label for="{{ $name }}">{{ $label }}</x-atoms.label>
    <x-atoms.select-input id="{{ $name }}" name="{{ $name }}" {{ $attributes }}>
        {{ $slot }}
    </x-atoms.select-input>
</div>