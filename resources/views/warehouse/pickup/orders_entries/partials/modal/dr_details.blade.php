<div id="DR_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="DockModal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Dock Receipts Details</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {!! Form::hidden('dr_line', null, ['id' => 'dr_line', 'class' => 'form-control input-sm']) !!}
                        <div class="col-md-5">{!! Form::bsMemo(null,null, 'Marks and Numbers', 'dr_cargo_marks', null, 2, '') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Pieces', 'dr_cargo_pieces', null, '') !!}</div>
                        <div class="col-md-5">{!! Form::bsMemo(null,null, 'Description of Commodities', 'dr_cargo_description', null, 2, '') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">{!! Form::bsText(null,null, 'Loaded on Container', 'dr_cargo_container', null, '') !!}</div>
                        <div class="col-md-5">{!! Form::bsComplete(null, null, 'Commodity', 'cargo_commodity_id', 'cargo_commodity_name', Request::get('term'), null, 'Search Commodity...') !!}</div>
                        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'dr_cargo_weight_metric', array('K' => 'KGS','L' => 'LBS'),'  ') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">{!! Form::bsText(null,null, 'Gross Wght', 'dr_cargo_grossw', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Cubic', 'dr_cargo_cubic', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Chgr Wght', 'dr_cargo_chgrw', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Rate', 'dr_cargo_rate', null, '0.000') !!}</div>
                        <div class="col-md-3">{!! Form::bsText(null,null, 'Amount', 'dr_cargo_amount', null, '0.000') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">{!! Form::bsMemo(null,null, 'Comments', 'dr_cargo_comments', null, 2, ' ') !!}</div>
                    </div>
                    <div class="row">
                        <p><b>* Use this detail sections for generating Dock Receipts</b></p>
                    </div>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-default btn-footer" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </a>
                    <a id="dr-details-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                        <i class="icon ion-android-done-all"></i> Save data
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>