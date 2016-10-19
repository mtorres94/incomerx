<div id="Vehicle_Details" class="modal fade" role="dialog" data-backdrop-limit="1" class="modal modal-child" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Vehicle Details</h4>
            </div>
            <div class="modal-body">
                <div class="easyui-tabs" id="vehicle-tabs">
                    <div title="Vehicle">
                        @include('export.oceans.booking_entries.partials.modal.sections.cargo_details.vehicle_details.vehicle')
                    </div>
                    <div title="General">
                        @include('export.oceans.booking_entries.partials.modal.sections.cargo_details.vehicle_details.general')
                    </div>
                    <div title="EEI Info">
                        @include('export.oceans.booking_entries.partials.modal.sections.cargo_details.vehicle_details.eei_info')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">{!! Form::bsMemo(null, null, 'Comments', 'vehicle_comments', null, 3, '') !!}</div>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" onclick='$("#Vehicle_Details").modal("hide")'>
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="vehicle-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>