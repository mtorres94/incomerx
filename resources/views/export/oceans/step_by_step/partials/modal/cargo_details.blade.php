<div id="Cargo_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Cargo & Vehicle Details</h4>
            </div>
            <div class="modal-body" >
                {!! Form::hidden('cargo_line', null, ['id' => 'cargo_line', 'class' => 'form-control input-sm']) !!}

                <div id="resumes_tabs" class="easyui-tabs">
                    <div title="Mark & Descriptions">
                        @include('export.oceans.step_by_step.partials.modal.sections.cargo.mark_description')
                    </div>

                 <!--   <div title="Cargo Details">
                        @include('export.oceans.step_by_step.partials.modal.sections.cargo.warehouse')
                    </div>-->
                </div>
                <div class="row row-panel">

                    <div class="col-md-4">{!! Form::bsText(null,null, 'Loaded on Container', 'cargo_container', null, '') !!}</div>
                    <div class="col-md-4">{!! Form::bsComplete(null, null, 'Cargo Type', 'cargo_type_id',  'cargo_type_code', Request::get('term'), null, 'Type') !!}</div>
                    <div class="col-md-4">{!! Form::bsComplete(null, null, 'Commodity', 'cargo_commodity_id', 'cargo_commodity_name', Request::get('term'), null, 'Search Commodity...') !!}</div>
                    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'cargo_weight_unit', array('K' => 'KGS','L' => 'LBS'),null) !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null,null, 'Weight(Kgs)', 'cargo_weight_k', null, '0.000') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null,null, 'Cubic(CBM)', 'cargo_cubic_k', null, '0.000') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null,null, 'Charge Weight(Kgs)', 'cargo_charge_weight_k', null, '0.000') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null,null, 'Rate', 'cargo_rate', null, '0.000') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null,null, 'Amount', 'cargo_amount', null, '0.000') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">{!! Form::bsText(null,null, 'Weight(Lbs)', 'cargo_weight_l', null, '0.000') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null,null, 'Cubic(CFT)', 'cargo_cubic_l', null, '0.000') !!}</div>
                    <div class="col-md-2">{!! Form::bsText(null,null, 'Charge Weight (Lbs)', 'cargo_charge_weight_l', null, '0.000') !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12">{!! Form::bsMemo(null,null, 'Comments', 'cargo_comments', null, 2, ' ') !!}</div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="cargo-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>
