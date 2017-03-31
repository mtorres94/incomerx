<div id="customer_mapping" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Accounting Mapping Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::hidden('mapping_line', null, ['id' => 'mapping_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::bsComplete('col-md-4', 'col-md-8', 'Customer', 'customer_id', 'customer_name', Request::get('term'),null, '') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-4', 'col-md-8', 'Code Mapping', 'code_mapping', null, '') !!}
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default btn-footer" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </a>
                    <a id="mapping_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                        <i class="icon ion-android-done-all"></i> Save data
                    </a>
                </div>
            </div>
        </div>
    </div>