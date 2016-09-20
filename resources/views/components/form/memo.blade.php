<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="{{ $lbl }} control-label">{{ $label }}</label>

    <div class="{{ $col }}">
        {!! Form::textarea($name, $value, ['id' => $name, 'class' => 'form-control', 'placeholder' => $placeholder, 'rows' => $rows]) !!}

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>