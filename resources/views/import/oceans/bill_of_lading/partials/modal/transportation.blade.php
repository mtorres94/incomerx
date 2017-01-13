<div id="TransportationDetails" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Transportation Details</h4>
            </div>
            <div class="modal-body">
                <div id="transportation-tabs" class="easyui-tabs">
                    {!! Form::hidden('transportation_id', null, ['id' => 'transportation_id', 'class' => 'form-control input-sm']) !!}

                    <div title="Transportation Details">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.transportation.transportation_details')
                    </div>
                    <div title="Origin & Destinations">
                        @include('import.oceans.bill_of_lading.partials.modal.sections.transportation.origin_destination')
                    </div>
                    <div title="Instructions">
                        {!! Form::bsMemo(null, null, '', 'instruction_comments',null,5) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="transportation-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>