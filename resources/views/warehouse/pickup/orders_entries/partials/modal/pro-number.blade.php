<div id="PRO-Numbers" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New PO Number Details</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    {!! Form::hidden('po_line', null, ['id' => 'PRO_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::bsText('col-md-3', 'col-md-8', 'PRO Number', 'PRO_number', null, 'PRO Number') !!}
                    {!! Form::bsText('col-md-3', 'col-md-8', 'Details', 'PRO_reference', null, 'Details') !!}
                    {!! Form::bsMemo('col-md-3', 'col-md-8', 'Remarks/Comments', 'PRO_remarks', null, 2, 'Remarks/Comments...') !!}
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="pro-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>