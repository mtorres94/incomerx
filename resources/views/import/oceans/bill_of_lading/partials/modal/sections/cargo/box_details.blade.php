<div id="Box_Details" class="modal fade" role="dialog" data-backdrop-limit="1" class="modal modal-child" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Cargo Details</h4>
            </div>
            <div class="modal-body">
                {!! Form::hidden('box_line', null, ['id' => 'box_line', 'class' => 'form-control input-sm']) !!}

                <div class="easyui-tabs" id="box-tabs">
                    <div title="General">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.cargo.box_details.general')
                    </div>
                    <div title="Part Info">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.cargo.box_details.part_info')
                    </div>
                    <div title="EEI Info">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.cargo.box_details.eei_info')
                    </div>
                    <div title="Hazardous">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.cargo.box_details.hazardous')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">{!! Form::bsMemo(null, null, 'Comments', 'box_comments', null, 3, '') !!}</div>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" onclick='$("#Box_Details").modal("hide")'>
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="box-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>