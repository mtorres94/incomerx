<div class="pull-{{ ($type == 1) ? 'right' : 'left' }}">
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(!is_null($data) ? $data->id : 0) !!}
</div>