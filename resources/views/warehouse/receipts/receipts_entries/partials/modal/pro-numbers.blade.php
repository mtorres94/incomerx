<div id="PRO-Numbers" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New PRO Number Details</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    {!! Form::hidden('receiving_line', null, ['id' => 'receiving_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::bsText('col-md-3', 'col-md-8', 'PRO Number', 'receiving_pro_number', null, 'PRO Number') !!}
                    {!! Form::bsText('col-md-3', 'col-md-8', 'Details', 'receiving_details', null, 'Details') !!}
                    {!! Form::bsMemo('col-md-3', 'col-md-8', 'Remarks/Notes', 'receiving_remarks', null, 2, 'Remarks/Notes...') !!}
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="receiving-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>