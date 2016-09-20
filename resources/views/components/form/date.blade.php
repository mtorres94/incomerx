<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="{{ $lbl }} control-label">{{ $label }}</label>

    <div class="{{ $col }}">
        {!! Form::text($name, $value, ['id' => $name, 'class' => 'form-control datepicker', 'placeholder' => $placeholder]) !!}

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
