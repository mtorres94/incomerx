<fieldset>
    <legend>{{ $label }}</legend>
</fieldset>
{!! Form::file($name."[]", ['id' => $name, 'class' => 'file-loading', 'multiple' => '']) !!}
<div id="errorBlock" class="help-block"></div>