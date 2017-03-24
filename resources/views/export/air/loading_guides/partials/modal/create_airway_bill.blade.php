<div id="create_airway_bill" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            {!! Form::open(['id' => 'data', 'route' => 'ea_loading_guides.storeAwb', 'method' => 'POST']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create AirwayBill</h4>
                <h5 class="modal-title">Select items in the list to create a HAWB/DAWB</h5>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-7"></div>

                    {!! Form::hidden('tmp_loading_guide_id', null, ['id' => 'tmp_loading_guide_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_departure_date', null, ['id' => 'tmp_departure_date', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_arrival_date', null, ['id' => 'tmp_arrival_date', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_booking_id', null, ['id' => 'tmp_booking_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_booking_code', null, ['id' => 'tmp_booking_code', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_flight', null, ['id' => 'tmp_flight', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_shipment_id', null, ['id' => 'tmp_shipment_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_shipment_code', null, ['id' => 'tmp_shipment_code', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_shipment_type', null, ['id' => 'tmp_shipment_type', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_date', null, ['id' => 'tmp_date', 'class' => 'form-control input-sm']) !!}
                </div>
                <table class="table table-bordered table-condensed" id="house_warehouse_details">
                    <thead>
                    <tr>
                        <th width="5%" ></th>
                        <th width="10%" >#WR</th>
                        <th width="10%" >Date in</th>
                        <th width="15%" >Shipper</th>
                        <th width="15%" >Consignee</th>
                        <th width="5%" >Qty.</th>
                        <th width="10%" >Weight</th>
                        <th width="10%" >Cubic</th>
                        <th width="10%" >Hazardous</th>
                        <th width="10%" >Destination</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-7">
                        {!! Form::bsCheck('col-md-1', 'col-md-6', 'Select/Deselect all', 'house_all') !!}
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <button id="create_airway_bill" class="btn btn-primary" type="submit">
                    <span>Create B/L</span>
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
