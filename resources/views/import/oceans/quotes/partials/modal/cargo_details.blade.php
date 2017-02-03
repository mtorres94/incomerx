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

                <div id="cargo_tabs" class="easyui-tabs">
                    <div title="General">
                        @include('import.oceans.quotes.partials.modal.sections.cargo.general')
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Marks', 'cargo_marks', null, '') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Container', 'cargo_container', null, '') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Charge Weight', 'cargo_charge_weight', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Gross Weight', 'cargo_gross_weight', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Rate', 'cargo_rate', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Total', 'cargo_total', null, '0.000') !!}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::bsMemo(null,null, '', 'cargo_comments', null, '') !!}
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
            </form>
        </div>
    </div>
</div>