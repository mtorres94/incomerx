<div id="cargo_details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Cargo  Details</h4>
                </div>
            <div class="modal-body">
                    {!! Form::hidden('cargo_line', null, ['id' => 'cargo_line', 'class' => 'form-control input-sm']) !!}
                    @include('accounting_bridge.invoice_notes.invoices.partials.modal.sections.cargo.general')
                </div>
            <div class="modal-footer">
                    <a class="btn btn-default btn-footer" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </a>
                    <button id="cargo_save" type="button" class="btn btn-primary">
                        <i class="icon ion-android-done-all"></i> Save data
                    </button>
                </div>
        </div>
    </div>
</div>
