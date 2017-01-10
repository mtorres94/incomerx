<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="{{ $lbl }} control-label">{{ $label }}</label>

    <div class="{{ $col }}">
        {!! Form::select($name, $array, null, ['title' => strtoupper($placeholder), 'id' => $name, 'class' => 'selectpicker form-control', 'data-live-search' => $flag, 'data-container' => $container, 'data-size' => 5]) !!}

        @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
