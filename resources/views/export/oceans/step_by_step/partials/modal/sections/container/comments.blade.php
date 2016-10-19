<div class="row no-padding-top">
    <div class="col-md-4">{!! Form::bsCheck('Dock Receipt', 'dock_receipt') !!}</div>
    <div class="col-md-4">{!! Form::bsCheck('Shipper Export Declarations', 'shipper_export') !!}</div>
    <div class="col-md-4">{!! Form::bsCheck('Attachments', 'attachments') !!}</div>

</div>
<div class="row no-padding-top">
    <div class="col-md-4">{!! Form::bsCheck('Release', 'release') !!}</div>
    <div class="col-md-4">{!! Form::bsCheck('Bill of Lading', 'bill_of_lading') !!}</div>
    <div class="col-md-4">{!! Form::bsCheck('Other', 'container_other') !!}</div>
</div>

<div class="row">
    {!! Form::bsMemo(null, null, 'Comments', 'container_comments', null,2, '') !!}
</div>