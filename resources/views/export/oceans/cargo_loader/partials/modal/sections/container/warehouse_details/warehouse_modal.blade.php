<!--- <div id="UNsModal" class="modal fade" tabindex="-1" data-backdrop-limit="1"> -->
<div id="Warehouse_Details" class="modal fade" role="dialog" data-backdrop-limit="1" class="modal modal-child" data-keyboard="false">

    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Cargo Details</h4>
            </div>
            <div class="modal-body">
                <div class="easyui-tabs" id="warehouse_tabs">
                    <div title="General">
                        @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_details.general')
                    </div>
                   <!-- <div title="Part Info">
                        @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_details.part_info')
                    </div>
                    <div title="EEI Info">
                        @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_details.eei_info')
                    </div>
                    <div title="Hazardous">
                        @include('export.oceans.cargo_loader.partials.modal.sections.container.warehouse_details.hazardous')
                    </div>-->
                </div>


            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="cargo_details_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>