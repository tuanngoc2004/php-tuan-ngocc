<div class="form-group">
    @include('atoms.Label', ['for' => $id, 'text' => $label])
    @include('atoms.TextArea', ['id' => $id, 'name' => $name, 'class' => $inputClass, 'placeholder' => $placeholder, 'value' => $value])
</div>