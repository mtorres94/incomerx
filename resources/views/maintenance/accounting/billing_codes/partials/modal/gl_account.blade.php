<div id="gl_account" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add a General Ledger Account</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {!! Form::hidden('general_line', null, ['id' => 'general_line', 'class' => 'form-control input-sm']) !!}

                        <div class="col-md-4"> {!! Form::bsComplete(null,null,  'GL Account', 'general_id', 'general_code', Request::get('term'),null, '') !!}</div>
                        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type', 'type', array('P' => 'Payables Account','I' => 'Income', 'R'=> 'Receivables Account', 'O'=> 'Operation Cost/Expense' ), ' ') !!}</div>
                        <div class="col-md-4"> {!! Form::bsComplete(null,null,  'State', 'state_id', 'state_name', Request::get('term'),null, '') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">{!! Form::bsText(null,null, 'Description', 'descriptions', null, '') !!}</div>
                        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Currency', 'currency_id', Sass\Currency::all()->lists('code', 'id'), ' ') !!}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default btn-footer" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </a>
                    <a id="account_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                        <i class="icon ion-android-done-all"></i> Save data
                    </a>
                </div>
        </div>
    </div>
</div>