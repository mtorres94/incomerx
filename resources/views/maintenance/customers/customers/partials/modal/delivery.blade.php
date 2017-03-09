<div id="deliveryAddress" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Customer Details</h4>
            </div>
            <div class="modal-body">
                {!! Form::hidden('delivery_line', null, ['id' => 'delivery_line', 'class' => 'form-control input-sm']) !!}

                <div class="row">
                    <div class="col-md-12"> {!! Form::bsComplete('col-md-3', 'col-md-9','Name ', 'delivery_id', 'delivery_name', null, 'NAME') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12"> {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'delivery_address', null, '') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12"> {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'delivery_city', null, '') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12"> {!! Form::bsComplete('col-md-3', 'col-md-9','State ', 'delivery_state_id', 'delivery_state_name', null, 'STATES') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12"> {!! Form::bsComplete('col-md-3', 'col-md-9','Zip code ', 'delivery_zip_code_id', 'delivery_zip_code', null, 'ZIP CODES') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12"> {!! Form::bsComplete('col-md-3', 'col-md-9','Country ', 'delivery_country_id', 'delivery_country_name',null, 'COUNTRY') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'delivery_phone', null, '') !!}</div>
                    <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'delivery_fax', null, '') !!}</div>
                </div>
                <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="delivery_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>


