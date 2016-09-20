<div id="Stop_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Stop Details</h4>
            </div>
            <div class="modal-body">
                @include('warehouse.pickup.orders_entries.partials.modal.sections.stops.general')
                <div class="row">
                    <div class="col-md-6">
                        @include('warehouse.pickup.orders_entries.partials.modal.sections.stops.customer')
                    </div>
                    <div class="col-md-6">
                        @include('warehouse.pickup.orders_entries.partials.modal.sections.stops.details')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="stops-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>