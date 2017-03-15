<div id="contact" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Generate AWB codes</h4>
            </div>
            <div class="modal-body">
                {!! Form::hidden('line', null, ['id' => 'line', 'class' => 'form-control input-sm']) !!}
                <div class="row">
                    <div class="col-md-8">{!! Form::bsText(null, null, 'Contact Name', 'contact_name', null, '') !!}</div>
                    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type', 'contact_type', array('1' => 'BOOKING AGENT'), 'Type') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">{!! Form::bsText(null, null, 'Phone', 'contact_phone', null, '') !!}</div>
                    <div class="col-md-4">{!! Form::bsText(null, null, 'Fax', 'contact_fax', null, '') !!}</div>
                    <div class="col-md-4">{!! Form::bsText(null, null, 'Mobile', 'contact_mobile', null, '') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">{!! Form::bsText(null, null, 'Email', 'contact_email', null, '') !!}</div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="contact-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save
                </a>
            </div>
        </div>
    </div>
</div>