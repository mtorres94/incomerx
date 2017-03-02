<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <div class="{{ $col }}">
        <div class="checkbox checkbox-primary">
            <input type="hidden" name="{{ $name }}" value="off">
            <input type="checkbox" class="styled" id="{{ $name }}" name="{{ $name }}" {{ $value == 'on' ? 'checked' : '' }}>
            <label for="{{ $name }}"></label>
        </div>
    </div>
    <label class="{{ $lbl }} control-label">{{ $label }}</label>
</div>