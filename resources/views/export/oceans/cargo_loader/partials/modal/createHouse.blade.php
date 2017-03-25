<div id="CreateHouse" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            {!! Form::open(['id' => 'data', 'route' => 'cargo_loader.storeHbl', 'method' => 'POST']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Bill of Lading</h4>
                <h5 class="modal-title">Select items in the list to create a HBL</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">{!! Form::bsSelect('col-md-5', 'col-md-7', 'GROUP HBL BY: ', 'group_by', array( '1' => 'SHIPPER', '2' => 'CONSIGNEE', '3' => 'SELECT WAREHOUSES'), null)!!}</div>
                    <div class="col-md-7">{!! Form::bsCheck('col-md-1', 'col-md-6', 'Select / Deselect All', 'select_all_whr') !!}</div>

                    {!! Form::hidden('tmp_cargo_loader_id', null, ['id' => 'tmp_cargo_loader_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_departure_date', null, ['id' => 'tmp_departure_date', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_arrival_date', null, ['id' => 'tmp_arrival_date', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_booking_code', null, ['id' => 'tmp_booking_code', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_carrier_id', null, ['id' => 'tmp_carrier_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_shipment_id', null, ['id' => 'tmp_shipment_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_shipment_code', null, ['id' => 'tmp_shipment_code', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_date_today', null, ['id' => 'tmp_date_today', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_place_receipt', null, ['id' => 'tmp_place_receipt', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_place_delivery', null, ['id' => 'tmp_place_delivery', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_port_loading_id', null, ['id' => 'tmp_port_loading_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_port_unloading_id', null, ['id' => 'tmp_port_unloading_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_container_details', null, ['id' => 'tmp_container_details', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_vessel_name', null, ['id' => 'tmp_vessel_name', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_voyage_name', null, ['id' => 'tmp_voyage_name', 'class' => 'form-control input-sm']) !!}

                </div>
                <table class="table table-bordered table-condensed" id="load_warehouses">
                    <thead>
                    <tr>
                        <th width="5%" ></th>
                        <th width="15%" >#WR</th>
                        <th width="20%" >Shipper</th>
                        <th width="20%" >Consignee</th>
                        <th width="10%" >Status</th>
                        <th width="10%" >Quantity</th>
                        <th width="15%" >Weight</th>
                        <th width="15%" >Cubic</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <button id="createHouse_save" class="btn btn-primary" type="submit">
                    <span>Create B/L</span>
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
