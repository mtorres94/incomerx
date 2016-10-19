
<div class="row">
    <div class="col-md-8">
        <legend>Hazardous Materials</legend>
        <div class="row">
            <div class="col-md-8">{!! Form::bsText(null, null, 'Contact', 'hazardous_contact', '') !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Phone', 'hazardous_phone', '') !!}</div>
        </div>
        <div class="row">
            <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#UNs_Details" onclick="cleanModalFields('UNs_Details')">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                </button>
                <button type="button"  class="btn btn-danger" onclick="clearTable('hazardous_details')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>

            <table class="table table-bordered table-condensed" id="hazardous_details">
                <thead>
                <tr>
                    <th data-override="uns_line" hidden></th>
                    <th width="15%" data-override="uns_number">UN #</th>
                    <th width="50%" data-override="uns_description"> Description</th>
                    <th width="15%"/>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <legend>Temperature Control</legend>
        <div class="row">
            <div class="col-md-8">{!! Form::bsText(null, null, 'Temperature', 'hazardous_temperature', '') !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Max', 'hazardous_max', '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-8">{!! Form::bsSelect(null, null, 'Degrees', 'hazardous_degrees', array('F' => 'Fahrenheit','C' => 'Celsius'), 'Type') !!}</div>
            <div class="col-md-4">{!! Form::bsText(null, null, 'Min', 'hazardous_min', '') !!}</div>
        </div>
    </div>
</div>