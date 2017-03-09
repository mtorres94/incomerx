<div id="ContactDetails" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Customer Details</h4>
            </div>
            <div class="modal-body">

                    {!! Form::hidden('customer_line', null, ['id' => 'customer_line', 'class' => 'form-control input-sm']) !!}
                    <div class="row">

                            <div class="col-md-8">{!! Form::bsText(null, null, 'Contact Name', 'tmp_contact', null, '') !!}</div>
                            <div class="col-md-4">{!! Form::bsText(null, null, 'Type', 'tmp_type', null, '') !!}</div>

                    </div>
                    <div class="row">
                            <div class="col-md-4">{!! Form::bsText(null, null, 'Phone', 'tmp_phone', null, '') !!}</div>
                            <div class="col-md-4">{!! Form::bsText(null, null, 'Fax', 'tmp_fax', null, '') !!}</div>
                            <div class="col-md-4">{!! Form::bsText(null, null, 'Mobile', 'tmp_mobile', null, '') !!}</div>
                    </div>
                    <div class="row">
                            <div class="col-md-8">{!! Form::bsText(null, null, 'Email', 'tmp_email', null, '') !!}</div>
                            <div class="col-md-4">{!! Form::bsText(null, null, 'Job Title', 'tmp_job_title', null, '') !!}</div>
                    </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="contact_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>
