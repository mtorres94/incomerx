<!-- Tabs Additional Information -->
<legend>Additional info</legend>
<div class="easyui-tabs">
    <!-- Tab References-->
    <div title="References">

        @include("warehouse.pickup.orders_entries.partials.sections.references")

    </div>
    <div title="Marks">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    {!! Form::bsMemo(null, null, 'Instructions', 'add_info_comments', null, 4, '') !!}
                </div>
            </div>
        </div>
    </div>

<!-- Tab Freight and Cod -->
    <div title="Freight & Cod">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-7 form-tab">
                    {!! Form::bsSelect('col-md-5', 'col-md-7', 'Freight Terms', 'freight_terms', array(
                           'P' => 'PREPAID',
                           'C' => 'COLLECTED',
                           'T' => 'THIRD PARTY'
                       ), 'Freight terms...') !!}
                    {!! Form::bsSelect('col-md-5', 'col-md-7', 'COD Terms', 'cod_terms', array(
                           'P' => 'PREPAID',
                           'C' => 'COLLECTED',
                           'T' => 'THIRD PARTY'
                       ), 'COD terms...') !!}
                </div>
                <div class="col-md-5 form-tab">
                    {!! Form::bsText('col-md-5', 'col-md-7', 'AMT', 'freight_terms_amt', null, '0.00') !!}
                    {!! Form::bsText('col-md-5', 'col-md-7', 'AMT', 'cod_terms_amt', null, '0.00') !!}
                </div>
            </div>


                <div class="row">
                    <div class="col-md-12 form-tab">
                        {!! Form::bsComplete('col-md-5', 'col-md-7', 'Payment term', 'payment_term_abbreviation', 'payment_term_name', Request::get('term'), ((isset($order_entry) and $order_entry->payment_term_abreviation > 0) ? $order_entry->payment_term->name : null), 'Payment term...') !!}
                    </div>
                </div>
            <div class="row">
            </div>
            </div>
        </div>

<!-- Tab PO -->
    <div title="PO">
        <div class="form-horizontal">

                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#PO-Numbers" onclick="cleanModalFields('PO-Numbers')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger" onclick="clearTable('PO_details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
                <table class="table table-bordered table-condensed" id="PO_details">
                    <thead>

                    <tr>
                        <th data-override="PO_line" hidden>Line</th>
                        <th data-override="PO_number" width="50%">PO Number</th>
                        <th data-override="PO_project_reference">Project/Reference</th>
                        <th data-override="PO_remarks" hidden width="35%">Remarks/ Comments</th>
                        <th width="15%"/>
                    </tr>
                    </thead>
                    <tbody>
                    @if (isset($order_entry))
                        @foreach ($order_entry->po_numbers as $detail)
                            <tr id="{{ $detail->line }}">
                                {!! Form::bsRowTd($detail->line, 'references_line', $detail->line, true) !!}
                                {!! Form::bsRowTd($detail->line, 'references_po_number', $detail->po_number, false) !!}
                                {!! Form::bsRowTd($detail->line, 'references_ref_number', $detail->ref_number, false) !!}
                                {!! Form::bsRowTd($detail->line, 'references_note', $detail->notes, true) !!}
                                {!! Form::bsRowBtns() !!}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

        </div>
    </div>

    <!-- Tab Caller -->
    <div title="Caller">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-9 ">
                    {!! Form::bsText('col-md-3','col-md-9', 'Caller name', 'caller_name', null, '') !!}
                </div>

            </div>
            <div class="row">
                <div class="col-md-9 ">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        {!! Form::bsMemo('col-md-3','col-md-9', 'Notes', 'caller_notes', null, 4, '') !!}
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Tab Trailer -->
    <div title="Trailer">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">{!! Form::bsSelect('col-md-5', 'col-md-7', 'Trailer Load', 'trailer_load', array(
                          'S' => 'By Shipper',
                          'D' => 'By Driver',
                      ), null) !!}
                    </div>
                    <div class="row">
                        {!! Form::bsSelect('col-md-5', 'col-md-7', 'Freight Counted', 'freight_counted', array(
                    'S' => 'By Shipper',
                    'PA' => 'By Driver Pallets',
                    'PI' => 'By Driver Pieces',
                    ), null) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Tab SO Details-->
    <div title="SO details">
        <div class="form-horizontal">

            <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#SO-Numbers" onclick="cleanModalFields('SO-Numbers')">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger" onclick="clearTable('SO_details')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
            <table class="table table-bordered table-condensed" id="SO_details">
                <thead>
                <tr>
                    <th data-override="SO_line" hidden>Line</th>
                    <th data-override="SO_number" width="50%">SO Number</th>
                    <th data-override="SO_reference">Details</th>
                    <th data-override="SO_remarks" hidden width="35%">Remarks/ Comments</th>
                    <th width="15%"/>
                </tr>
                </thead>
                <tbody>
                @if(isset($order_entry))
                    @foreach ($order_entry->so_numbers as $detail)
                        <tr id="{{ $detail->line }}">
                            {!! Form::bsRowTd($detail->line, 'SO_line', $detail->line, true) !!}
                            {!! Form::bsRowTd($detail->line, 'SO_number', $detail->so_number, false) !!}
                            {!! Form::bsRowTd($detail->line, 'SO_reference', $detail->so_detail, false) !!}
                            {!! Form::bsRowTd($detail->line, 'SO_remarks', $detail->so_comment, true) !!}
                            {!! Form::bsRowBtns() !!}
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>

</div>
