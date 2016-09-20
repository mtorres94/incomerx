<div id="UNs" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Hazardous Details</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    {!! Form::hidden('tmp_hazardous_uns_line', null, ['id' => 'tmp_hazardous_uns_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::bsComplete('col-md-3', 'col-md-8', 'UN #', 'tmp_hazardous_uns_id', 'tmp_hazardous_uns_code', Request::get('term'), null, 'UNs...') !!}
                    {!! Form::bsMemo('col-md-3', 'col-md-8', 'Description', 'tmp_hazardous_uns_desc', null, 1, 'Description...') !!}
                    {!! Form::bsMemo('col-md-3', 'col-md-8', 'Remarks/Notes', 'tmp_hazardous_uns_note', null, 2, 'Remarks/Notes...') !!}
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="hazardous-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>