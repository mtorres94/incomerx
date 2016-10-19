<div id="ItemDetails" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Item Details</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    {!! Form::hidden('item_line', null, ['id' => 'item_line', 'class' => 'form-control input-sm']) !!}
                    <div class="row">
                        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Item', 'item_id', 'item_name', Request::get('term'), ((isset($bill_lading) and $bill_lading->item_id > 0) ? $bill_lading->item->name : null), 'Items') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Customer/Grower', 'customer_id', 'customer_name', Request::get('term'), ((isset($bill_lading) and $bill_lading->customer_id > 0) ? $bill_lading->customer->name : null), 'Customer') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Qty', 'item_quantity', null, '0') !!}</div>
                            <div class="col-md-6"> {!! Form::bsComplete('col-md-3', 'col-md-9', 'Type', 'item_type_code', 'item_type_name', Request::get('term'), ((isset($bill_lading) and $bill_lading->customer_id > 0) ? $bill_lading->customer->name : null), 'Type') !!}</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Total Weight', 'item_weight', null, '0.00') !!}</div>
                            <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', 'Kgs/ Lbs', 'item_unit', array('K' => 'KGS','L' => 'LBS',), null) !!}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="item_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>
