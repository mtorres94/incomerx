<div id="ItemModal" class="modal fade" role="dialog" data-backdrop-limit="1" class="modal modal-child" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Item Details</h4>
            </div>
            <div class="modal-body">

                    <div class="row">
                        {!! Form::hidden('item_line', null, ['id' => 'item_line', 'class' => 'form-control input-sm']) !!}
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Pieces', 'item_pieces', null, '0') !!}</div>
                        <div class="col-md-4">{!! Form::bsComplete(null,null, 'Item Descriptions', 'item_item_id', 'item_item_name', Request::get('term'), null, '') !!}</div>
                        <div class="col-md-3">{!! Form::bsText(null,null, 'Un. Weight', 'item_unit_weight', null, '0.00') !!}</div>
                        <div class="col-md-3">{!! Form::bsText(null,null, 'Brand', 'item_brand', null, '') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">{!! Form::bsComplete(null,null, 'Vendor', 'item_vendor_code', 'item_vendor_name', Request::get('term'), null, '') !!}</div>
                        <div class="col-md-4">{!! Form::bsText(null,null, 'Origin', 'item_origin', null, '') !!}</div>
                        <div class="col-md-4">{!! Form::bsDate(null,null, 'Exp. Date', 'item_exp_date', null, '') !!}</div>
                    </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="item-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>