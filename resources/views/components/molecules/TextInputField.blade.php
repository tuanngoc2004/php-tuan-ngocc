<div class="form-group">
    @include('atoms.Label', ['for' => $id, 'text' => $label])
    @include('atoms.TextInput', ['id' => $id, 'name' => $name, 'class' => $inputClass, 'value' => $value, 'placeholder' => $placeholder])
</div>