<div class="form-group">
    @include('atoms.Label', ['for' => $id, 'text' => $label])
    @include('atoms.SelectInput', ['id' => $id, 'name' => $name, 'class' => $inputClass, 'options' => $options])
</div>