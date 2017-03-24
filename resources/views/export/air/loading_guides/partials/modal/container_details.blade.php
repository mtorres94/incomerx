<div id="container_details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="ContainerModal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="modal-title">New Container Details</h4>
                            <h5 class="modal-title">Container Details</h5></div>
                        <div class="col-md-6">
                            <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                                <a type="button" class="btn btn-default btn-sm" id="btn-load-warehouse" onclick="cleanModalFields('LoadWarehouse'), clearTableCondition('load_warehouse_details')" data-toggle="modal" data-target="#LoadWarehouse"><i class="fa fa-search" aria-hidden="true"></i><span>Load Warehouse Receipts</span></a>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-body">
                    {!! Form::hidden('container_id', null, ['id' => 'container_id', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('equipment_type_code', null, ['id' => 'equipment_type_code', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('sum_volume_weight', null, ['id' => 'sum_volume_weight', 'class' => 'form-control input-sm']) !!}

                    <div class="row">
                        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Equip. Type', 'equipment_type_id',  Sass\CargoType::all()->lists('code', 'id'), 'TYPE', 'body') !!}</div>
                        <div class="col-md-3">{!! Form::bsText(null, null, 'Equip./Container #', 'container_number', null, '') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null, null, 'Seal Number 1', 'container_seal_number1', null, '') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null, null, 'Seal Number 2', 'container_seal_number2', null, '') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null, null, 'Order Number', 'container_order_number', null, '') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @include('export.oceans.cargo_loader.partials.modal.sections.container.tabs.cargo_details')
                        </div>
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
            </form>
        </div>
    </div>
</div>