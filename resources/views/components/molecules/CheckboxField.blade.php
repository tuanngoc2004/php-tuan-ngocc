<div class="form-group">
    <div class="form-check">
        @include('atoms.TextInput', ['id' => $id, 'name' => $name, 'class' => $inputClass, 'value' => $value])
        @include('atoms.Label', ['for' => $id, 'text' => $label, 'class' => 'form-check-label'])
    </div>
</div>