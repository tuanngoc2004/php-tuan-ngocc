<div class="form-group">
    @include('atoms.Label', ['for' => $id, 'text' => $label])
    @include('atoms.DateInput', ['id' => $id, 'name' => $name, 'class' => $inputClass, 'value' => $value])
</div>