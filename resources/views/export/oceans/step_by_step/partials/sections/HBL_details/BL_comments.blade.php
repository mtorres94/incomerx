<legend>BL Comments</legend>
<div class="row">
    <div class="col-md-12">

            {!! Form::bsText(null, null, 'BL Comments', 'bl_comments', null, ' ') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
            <div class="col-md-6">{!! Form::bsSelect(null, null, 'Doc Type', 'bl_doc_type', array(
            'C' => 'ORIGINAL',
            'P' => 'EXPRESS RELEASE',
        ), 'Type') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null, 'FMC Number', 'fmc_number', null, ' ') !!}</div>
        </div>
</div>
<div class="row">
    <div class="col-md-12">
            <div class="col-md-6">{!! Form::bsMemo(null, null, 'Export Reference', 'export_reference', null, 2,' ') !!}</div>
            <div class="col-md-6">{!! Form::bsMemo(null, null, 'Notes', 'bl_notes', null, 2,' ') !!}</div>
    </div>
</div>