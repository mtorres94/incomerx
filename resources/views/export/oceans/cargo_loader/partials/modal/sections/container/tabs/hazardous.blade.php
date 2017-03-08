<div class="row">
    {!! Form::bsText("col-md-3","col-md-9", 'Contact', 'container_hazardous_contact', null, '') !!}
</div>
<div class="row">
    {!! Form::bsText("col-md-3","col-md-4", 'Phone', 'container_hazardous_phone', null, '') !!}
</div>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#UNs_Details" onclick="cleanModalFields('UNs_Details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-danger" onclick="clearTable('hazardous_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>
<table class="table table-bordered table-condensed" id="hazardous_details">
    <thead>
    <tr>
        <th hidden data-override="hazardous_details_uns_id">?</th>
        <th hidden data-override="hazardous_details_line">Line</th>
        <th width="15%" data-override="hazardous_details_uns_code">UN #</th>
        <th width="50%" data-override="hazardous_details_uns_description">Description</th>

        <th width="15%"></th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
