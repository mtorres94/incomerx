<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="{{ $lbl }} control-label">{{ $label }}</label>

    <div class="{{ $col }}">
        <div class="input-group">
            {!! Form::hidden($name, $value, ['id' => $name, 'class' => 'form-control input-sm', 'placeholder' => $placeholder]) !!}
            {!! Form::text($tmp, $tmp_value, ['id' => $tmp, 'class' => 'form-control input-sm', 'placeholder' => $placeholder]) !!}
            <span class="input-group-addon">
                <i id="{{ $tmp.'_spn' }}" class="fa fa-space fa-search" aria-hidden="true"></i>
                <img src="{{ asset('images/loading.gif') }}" class="img-none" height="15" id="{{ $tmp.'_img' }}">
            </span>
            <div class="input-group-addon">
                <a tabindex="-1" href="javascript:void(0)" class="btn btn-default" data-main='{{ trans('panel.main') }}'
                   data-id='{{ (isset($tab_id) or !empty(trim($tab_id))) ? trans($tab_id) : "" }}'
                   data-title='{{ (isset($tab_title) or !empty(trim($tab_title))) ? trans($tab_title) : "" }}'
                   data-route='{{ (isset($route) or !empty(trim($route))) ? route($route) : "" }}'>
                    <i class="fa fa-bolt fa-new" aria-hidden="true"></i>
                </a>
            </div>
        </div>

    @if ($errors->has($name))
            <span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>