<div id="Container_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="ContainerModal" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Container Details</h4>
                <h5 class="modal-title">Container Details</h5>
            </div>
            <div class="modal-body">
                {!! Form::hidden('container_id', null, ['id' => 'container_id', 'class' => 'form-control input-sm']) !!}
                {!! Form::hidden('tmp_equipment_type_code', null, ['id' => 'tmp_equipment_type_code', 'class' => 'form-control input-sm']) !!}

                <div class="row">
                    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Equip. Type', 'tmp_equipment_type_id', Sass\CargoType::all()->lists('code', 'id'), 'Type', 'body') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Equip./Container #', 'tmp_number', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Seal #1', 'tmp_seal_number', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Seal #2', 'tmp_seal_number2', null, '') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">{!! Form::bsComplete(null, null, 'Commodity', 'tmp_commodity_id', 'tmp_commodity_name', Request::get('term'), null, 'Commodity') !!}</div>
                    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Status', 'tmp_pd_status', array(
                        '1' => '1 - RECEIVED',
                        '2' => '2 - UNLOADED',
                        '3' => '3 - DELIVERED',
                        '4' => '4 - COMPLETED',
                    ), 'Status...') !!}</div>

                    <div class="col-md-3">{!! Form::bsDate(null, null, 'Spotting date', 'tmp_spotting_date', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsDate(null, null, 'Pull Date', 'tmp_pull_date', null, '') !!}</div>
                </div>

                <div class="easyui-tabs" id="container_tabs">
                    <div title="Drayage/ Reefer">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.container.drayage_reefer')
                    </div>
                    <div title="Pickup">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.container.pickup')
                    </div>
                    <div title="Delivery">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.container.delivery')
                    </div>
                    <div title="Drop">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.container.drop')
                    </div>

                    <div title="Comments">
                       <div class="row">
                           {!! Form::bsMemo(null, null, 'Comments', 'tmp_comments', null,3, '') !!}
                       </div>
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