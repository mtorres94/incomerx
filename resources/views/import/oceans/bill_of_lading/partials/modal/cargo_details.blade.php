<div id="Cargo_Details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg" >
        <!-- Modal content-->
        <div class="modal-content">
            <form id="CargoModal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Cargo  Details</h4>
                </div>
                <div class="modal-body" >
                    {!! Form::hidden('cargo_line', null, ['id' => 'cargo_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_cargo_type_code', null, ['id' => 'tmp_cargo_type_code', 'class' => 'form-control input-sm']) !!}

                    <div id="cargo-tabs" class="easyui-tabs">
                        <div title="Mark & Descriptions">
                            @include('import.oceans.bill_of_lading.partials.modal.sections.cargo.mark_description')
                        </div>

                       <!-- <div title="Cargo Details">
                            @include('import.oceans.bill_of_lading.partials.modal.sections.cargo.warehouse')
                        </div>-->
                    </div>

                    <div class="row">
                        <div class="col-md-3">{!! Form::bsText(null,null, 'Loaded on Container', 'tmp_container', null, '') !!}</div>
                        <div class="col-md-4">{!! Form::bsSelect(null, null, 'Cargo Type', 'tmp_cargo_type_id', Sass\CargoType::all()->lists('code', 'id'),'Type', 'body', false) !!}</div>
                     <!--   <div class="col-md-3">{!! Form::bsComplete(null, null, 'Commodity', 'tmp_commodity_id', 'tmp_commodity_name', Request::get('term'), null, 'Search Commodity...') !!}</div>-->



                    </div>
                    <div class="row">
                        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'tmp_weight_unit', array('K' => 'KGS','L' => 'LBS'),null) !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Gross Wght', 'tmp_grossw', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Cubic', 'tmp_cubic', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Chrg Wght', 'tmp_charge_weight', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Rate', 'tmp_rate', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Amount', 'tmp_amount', null, '0.000') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">{!! Form::bsMemo(null,null, 'Comments', 'tmp_comments', null, 2, ' ') !!}</div>
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
            </form>
        </div>

    </div>
</div>