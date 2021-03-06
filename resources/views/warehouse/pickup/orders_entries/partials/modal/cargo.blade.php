<div id="cargo-warehouse" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="CargoModal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Warehouse Details</h4>
                    <h5 class="modal-title">Cargo Details</h5>
                </div>
                <div class="modal-body">
                    <div id="cargo-tabs" class="easyui-tabs">
                        <div title="General">
                            @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.general')
                        </div>
                        <div title="Part Info">
                            @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.part_info')
                        </div>
                        <div title="EEI Info">
                            @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.eei_info')
                        </div>
                        <div title="Hazardous">
                            @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.hazardous')
                        </div>
                        <div title="Items">
                            @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.items')
                        </div>
                        <div title="References">
                            @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.references')
                        </div>
                        <div title="Shipping Ref(s)">
                            @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.shipping_ref')
                        </div>
                        <div title="Other Ref(s)">
                            @include('warehouse.pickup.orders_entries.partials.modal.sections.cargo.other_ref')
                        </div>
                        <div title="Comments">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::bsMemo(null,null, '', 'comments_comment', null, 5, 'Comments...') !!}
                                </div>
                            </div>
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
            </form>
        </div>
    </div>
</div>
