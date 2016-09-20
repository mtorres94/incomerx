<div class="easyui-tabs">
    <div title="Receiving">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-7 form-tab">
                    {!! Form::bsComplete('col-md-5', 'col-md-7', 'Inland Carrier', 'receiving_carrier_id', 'receiving_carrier_name', Request::get('term'), null, 'Carriers...') !!}
                    {!! Form::bsText('col-md-5', 'col-md-7', 'Freight Amt. $', 'receiving_freight_amt', null, '0.00') !!}
                    {!! Form::bsText('col-md-5', 'col-md-7', 'COD Amount', 'receiving_cod_amount', null, '0.00') !!}
                    {!! Form::bsSelect('col-md-5', 'col-md-7', 'Carrier Terms', 'receiving_carrier_terms', array(
                        'C' => 'COLLECT',
                        'O' => 'ON ACCOUNT/CREDIT',
                        'P' => 'PREPAID'
                    ), 'Carrier terms...') !!}
                </div>
                <div class="col-md-5 form-tab">
                    {!! Form::bsDate('col-md-4', 'col-md-8', 'Date', 'receiving_date', null, null) !!}
                    {!! Form::bsText('col-md-4', 'col-md-8', 'Chk #', 'receiving_1_check', null, null) !!}
                    {!! Form::bsText('col-md-4', 'col-md-8', 'Chk #', 'receiving_2_check', null, null) !!}
                </div>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#PRO-Numbers" onclick="cleanModalFields('PRO-Numbers')">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger" onclick="clearTable('pro-numbers-details')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
            <table class="table table-bordered table-condensed" id="receiving-details">
                <thead>
                <tr>
                    <th data-override="receiving_line" hidden>Line</th>
                    <th data-override="receiving_pro_number" width="50%">PRO Number</th>
                    <th data-override="receiving_details">Details</th>
                    <th data-override="receiving_remarks" hidden width="35%">Remarks</th>
                    <th width="15%"/>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="row">
                <div class="col-md-7 form-tab">
                    {!! Form::bsText('col-md-5', 'col-md-7', 'Received by', 'receiving_receiving_by', null, 'Receiving by') !!}
                    {!! Form::bsText('col-md-5', 'col-md-7', 'Checked by', 'receiving_checked_by', null, 'Checked by') !!}
                    {!! Form::bsText('col-md-5', 'col-md-7', 'Pictures by', 'receiving_pictures_by', null, 'Pictures by') !!}
                </div>
                <div class="col-md-5 form-tab">
                    {!! Form::bsComplete('col-md-4', 'col-md-8', 'Driver', 'receiving_driver_id', 'receiving_driver_name', Request::get('term'), null, 'Drivers...') !!}
                    {!! Form::bsText('col-md-4', 'col-md-8', 'License', 'receiving_driver_license', null, null) !!}
                    {!! Form::bsText('col-md-4', 'col-md-8', 'Plate', 'receiving_driver_plate', null, null) !!}
                </div>
            </div>
        </div>
    </div>
    <div title="References">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#References" onclick="cleanModalFields('References')">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" onclick="clearTable('references-details')">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>
        <table class="table table-bordered table-condensed" id="references-details">
            <thead>
            <tr>
                <th hidden data-override="references_line">Line</th>
                <th width="35%" data-override="references_po_number">PO Number</th>
                <th width="25%" data-override="references_ref_number">Ref #/Box ID</th>
                <th data-override="references_inv_number" hidden>Inv #/Dealer</th>
                <th width="25%" data-override="references_booking_number">Booking Number</th>
                <th data-override="references_invoice_amount" hidden>Invoice Amount</th>
                <th data-override="references_remarks" hidden>Remarks</th>
                <th width="15%"></th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div title="Hazardous">
        <div class="form-horizontal">
            <div class="row-form">
                {!! Form::bsText('col-md-3', 'col-md-7', 'Contact', 'hazardous_contact', null, 'Hazardous contact...') !!}
            </div>
            <div class="row-form">
                {!! Form::bsText('col-md-3', 'col-md-5', 'Phone', 'hazardous_phone', null, 'Hazardous contact...') !!}
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#UNs" onclick="cleanModalFields('UNs')">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger" onclick="clearTable('hazardous-details')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
            <table class="table table-bordered table-condensed" id="hazardous-details">
                <thead>
                <tr>
                    <th hidden data-override="hazardous_details_uns_id">?</th>
                    <th hidden data-override="hazardous_details_line">Line</th>
                    <th width="15%" data-override="hazardous_details_uns_code">UN #</th>
                    <th width="30%" data-override="hazardous_details_uns_description">Description</th>
                    <th width="40%" data-override="hazardous_details_remarks">Remarks</th>
                    <th width="15%"></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
