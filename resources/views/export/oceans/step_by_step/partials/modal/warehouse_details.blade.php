<!--- <div id="UNsModal" class="modal fade" tabindex="-1" data-backdrop-limit="1"> -->
<div id="Warehouse_Details" class="modal fade" role="dialog" data-backdrop-limit="1" class="modal modal-child" data-keyboard="false">

    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Warehouse Details</h4>
            </div>
            <div class="modal-body">
                @include('export.oceans.step_by_step.partials.modal.sections.warehouse.general')
                <div class="row">
                    <div class="col-md-6">
                        @include('export.oceans.step_by_step.partials.modal.sections.warehouse.shipper')
                    </div>
                    <div class="col-md-6">
                        @include('export.oceans.step_by_step.partials.modal.sections.warehouse.consignee')
                    </div>
                </div>
                @include('export.oceans.step_by_step.partials.modal.sections.warehouse.cargo_details')


            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="cargo_warehouse_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>