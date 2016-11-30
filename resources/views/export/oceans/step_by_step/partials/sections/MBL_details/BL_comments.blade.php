<legend>BL Comments</legend>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">{!! Form::bsText('col-md-5', 'col-md-7', 'Document #', 'document_number', null, ' ') !!}</div>
            <div class="col-md-6">{!! Form::bsText('col-md-5', 'col-md-7', 'BL Comments', 'bl_comments', null, ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsSelect('col-md-5', 'col-md-7', 'Doc Type', 'bl_doc_type', array(
            'C' => 'ORIGINAL',
            'P' => 'EXPRESS RELEASE',
        ), 'Type') !!}</div>
            <div class="col-md-6">{!! Form::bsText('col-md-5', 'col-md-7', 'FMC Number', 'fmc_number', null, ' ') !!}</div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="row">
            <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Export Reference', 'export_reference', null, 2,' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Notes', 'bl_notes', null, 2,' ') !!}</div>
        </div>
    </div>
</div>