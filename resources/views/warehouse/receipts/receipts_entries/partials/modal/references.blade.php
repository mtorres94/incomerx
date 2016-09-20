<div id="References" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Reference Details</h4>
            </div>
            <div class="modal-body">
                {!! Form::hidden('references_line', null, ['id' => 'references_line', 'class' => 'form-control input-sm']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::bsText(null, null, 'PO Number', 'references_po_number', 'references_po_number', null, 'PO Number') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::bsText(null, null, 'Project/Ref. #/Box ID #/Shipment', 'references_ref_number', null, 'Ref #') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::bsText(null, null, 'Booking Number', 'references_booking_number', null, 'Booking Number') !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::bsText(null, null, 'Inv Number/Dealer Coder', 'references_inv_number', null, 'Inv number') !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::bsText(null, null, '$ Invoice Amount', 'references_invoice_amount', null, '0.00') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::bsMemo(null, null, 'Remarks/Notes', 'references_note', null, 2, 'Remarks/Notes...') !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="references-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>