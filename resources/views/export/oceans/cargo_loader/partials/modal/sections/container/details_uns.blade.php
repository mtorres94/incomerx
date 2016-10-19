<!--- <div id="UNsModal" class="modal fade" tabindex="-1" data-backdrop-limit="1"> -->
<div id="UNs_Details" class="modal fade" role="dialog" data-backdrop-limit="1" class="modal modal-child" data-keyboard="false">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Item Details</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    {!! Form::hidden('hazardous_uns_line', null, ['id' => 'hazardous_uns_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::bsComplete('col-md-3', 'col-md-8', 'UN #', 'hazardous_uns_id', 'hazardous_uns_code', Request::get('term'), null, 'UNs...') !!}
                    {!! Form::bsMemo('col-md-3', 'col-md-8', 'Description', 'hazardous_uns_desc', null, 1, 'Description...') !!}
                    {!! Form::bsMemo('col-md-3', 'col-md-8', 'Remarks/Notes', 'hazardous_uns_note', null, 2, 'Remarks/Notes...') !!}
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="uns-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>