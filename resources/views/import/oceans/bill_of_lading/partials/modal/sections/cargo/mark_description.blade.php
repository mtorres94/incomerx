<div class="row">
    {!! Form::hidden('cargo_line', null, ['id' => 'cargo_line', 'class' => 'form-control input-sm']) !!}
    <div class="col-md-5">{!! Form::bsMemo(null,null, 'Marks and Numbers', 'tmp_marks', null, 2, '') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null,null, 'Pieces', 'tmp_pieces', null, '') !!}</div>
   <div class="col-md-5">{!! Form::bsMemo(null,null, 'Description of Commodities', 'tmp_description', null, 2, '') !!}</div>
</div>