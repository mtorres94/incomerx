<div id="HBL_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">HBL Details</h4>
            </div>
            <div class="modal-body" >
                {!! Form::hidden('hbl_line', null, ['id' => 'hbl_line', 'class' => 'form-control input-sm']) !!}

                <iframe src="http://incomerx.app/export/oceans/bill_of_lading/create" height="100%" width="100%" style="border:none;"></iframe>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="cargo-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>
