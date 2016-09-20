<div id="cargo-warehouse" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Warehouse Details</h4>
                <h5 class="modal-title">Cargo Details</h5>
            </div>
            <div class="modal-body">
                <div id="cargo-tabs" class="easyui-tabs">
                    <div title="General">
                        @include('warehouse.receipts.receipts_entries.partials.modal.sections.cargo.general')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="cargo-warehouse-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>