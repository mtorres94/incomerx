<div id="Container_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Container Details</h4>
                <h5 class="modal-title">Container Details</h5>

                    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                        <a type="button" class="btn btn-default btn-sm" id="btn-load-warehouse" onclick="cleanModalFields('LoadWarehouse'), clearTable('load_warehouse_details')" data-toggle="modal" data-target="#LoadWarehouse"><i class="fa fa-search" aria-hidden="true"></i><span>Load Warehouse Receipts</span></a>

                    </div>

            </div>
            <div class="modal-body">
                {!! Form::hidden('container_id', null, ['id' => 'container_id', 'class' => 'form-control input-sm']) !!}

                <div class="row">
                    <div class="col-md-3">{!! Form::bsComplete(null, null, 'Equip. Type', 'equipment_type_id', 'equipment_type_code', Request::get('term'), null, 'Type') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Equip./Container #', 'container_number', null, '') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null, null, 'Seal Number 1', 'container_seal_number1', null, '') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null, null, 'Seal Number 2', 'container_seal_number2', null, '') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null, null, 'Order Number', 'container_order_number', null, '') !!}</div>
                    </div>

                <div class="easyui-tabs" id="container_tabs">
                    <div title="Cargo Details">
                        @include('export.oceans.cargo_loader.partials.modal.sections.container.cargo_details')
                    </div>
                    <div title="Hazardous Material & Temperature">
                        @include('export.oceans.cargo_loader.partials.modal.sections.container.hazardous')
                    </div>
                    <div title="Comments and Instructions">
                        <div class="col-md-12">{!! Form::bsMemo(null, null, '', 'comments_instructions', null, 2,'') !!}</div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'Cubic Max ', 'cubic_max', '') !!}</div>
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'C. Loaded', 'cubic_load', '') !!}</div>
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'C. Loaded %', 'cubic_load_p', '') !!}</div>
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'C. Excess', 'cubic_excess', '') !!}</div>

                </div>
                <div class="row">
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'Pcs loaded ', 'pieces_loaded', '') !!}</div>
                    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'container_weight_unit', array('K' => 'Kgs', 'L' => 'Lbs'), ' ') !!}</div>
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'Weight', 'max_weight', '') !!}</div>
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'W. Loaded', 'weight_load', '') !!}</div>
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'W. Loaded %', 'weight_load_p', '') !!}</div>
                    <div class="col-md-2"> {!! Form::bsText(null, null, 'W. Excess', 'weight_excess', '') !!}</div>

                </div>
            </div>

            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="container-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>