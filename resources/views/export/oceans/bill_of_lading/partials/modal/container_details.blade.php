<!---<div id="Container_Details" class="modal fade" tabindex="-1">-->
<div id="Container_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

<div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Container Details</h4>
                <h5 class="modal-title">Container Details</h5>
            </div>
            <div class="modal-body">
                {!! Form::hidden('container_line', null, ['id' => 'container_line', 'class' => 'form-control input-sm']) !!}

                <div class="row">
                    <div class="col-md-3">{!! Form::bsComplete(null, null, 'Equip. Type', 'equipment_type_id', 'equipment_type_code', Request::get('term'), null, 'Type') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Equip./Container #', 'container_number', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Seal #1', 'container_seal_number', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Seal #2', 'container_seal_number2', null, '') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-3">{!! Form::bsComplete(null, null, 'Commodity', 'container_commodity_id', 'container_commodity_name', Request::get('term'), null, 'Commodity') !!}</div>
                    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Status', 'pd_status', array(
                        '1' => '1 - LOAD ORDER',
                        '2' => '2 - PICKED',
                        '3' => '3 - LOADED',
                        '4' => '4 - COMPLETED',
                    ), 'Status...') !!}</div>

                    <div class="col-md-3">{!! Form::bsDate(null, null, 'Spotting date', 'container_spotting_date', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsDate(null, null, 'Pull Date', 'container_pull_date', null, '') !!}</div>
                </div>

                    <div class="easyui-tabs" id="container_tabs">
                        <div title="Drayage/ Reefer">
                            @include('export.oceans.bill_of_lading.partials.modal.sections.container.drayage_reefer')
                        </div>
                        <div title="Pickup">
                            @include('export.oceans.bill_of_lading.partials.modal.sections.container.pickup')
                        </div>
                        <div title="Delivery">
                            @include('export.oceans.bill_of_lading.partials.modal.sections.container.delivery')
                        </div>
                        <div title="Drop">
                            @include('export.oceans.bill_of_lading.partials.modal.sections.container.drop')
                        </div>
                        <div title="Hazardous">
                            @include('export.oceans.bill_of_lading.partials.modal.sections.container.hazardous')
                        </div>
                        <div title="Comments">
                            @include('export.oceans.bill_of_lading.partials.modal.sections.container.comments')
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
        </div>
    </div>
</div>