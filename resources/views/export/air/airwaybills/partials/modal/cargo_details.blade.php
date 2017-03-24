<div id="cargo_details" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg" >
        <!-- Modal content-->

        <div class="modal-content">
            <form id="CargoModal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Cargo Details</h4>
                </div>
                <div class="modal-body" >
                    <style type="text/css">
                        #table-wrapper {
                            position:relative;
                        }
                        #table-scroll {
                            height:250px;
                            overflow:auto;
                            margin-top:20px;
                        }
                        #table-wrapper table {
                            width:100%;

                        }
                        #table-wrapper table * {
                            color:black;
                        }
                        #table-wrapper table thead th .text {
                            position:absolute;
                            top:-20px;
                            z-index:2;
                            height:20px;
                            width:35%;

                        }
                    </style>
                    {!! Form::hidden('cargo_line', null, ['id' => 'cargo_line', 'class' => 'form-control input-sm']) !!}
                  <div id="table-wrapper">
                      <div id="table-scroll">
                          <table class="table table-bordered table-condensed" id="details_cargo">
                              <thead>
                              <tr>
                                  <th hidden></th>
                                  <th width="5%" >Qty</th>
                                  <th width="10%" >Unit</th>
                                  <th width="10%" >Length</th>
                                  <th width="10%" >Width</th>
                                  <th width="10%" >Height</th>
                                  <th width="10%" >Weight</th>
                                  <th width="10%" >Vol Weight</th>

                              </tr>
                              </thead>
                              <tbody>
                              </tbody>
                          </table>
                      </div>
                  </div>

                    <div class="row">
                        <div class="col-md-1">{!! Form::bsText(null,null, 'Pieces', 'cargo_pieces', null, '0') !!}</div>

                        <div class="col-md-2">{!! Form::bsText(null,null, 'Gross Wgt.', 'cargo_gross_weight', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Vol. Wgt.', 'cargo_volume_weight', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Chr. Wgt.', 'cargo_charge_weight', null, '0.000') !!}</div>
                        <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'cargo_unit_weight', array('K' => 'KGS','L' => 'LBS'), '') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Rate', 'cargo_rate', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Total', 'cargo_total', null, '0.000') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Rate Class', 'cargo_rate_class', array(
                        'C' => 'Specific commodity Rate ',
                        'E' => 'Weight in Excess',
                        'M' => 'Minimum Charge',
                        'N' => 'Normal under 45 KG (100 lb)',
                        'Q' => 'Quantity over 45 KG (100 lb)',
                        'R' => 'Class Rate (Reduction)',
                        'S' => 'Class Rate (Surcharge)',
                        'U' => 'Pivot weight',
                        'X' => 'ULD',
                        'Y' => 'ULD Discount',
                        ),null) !!}</div>
                        <div class="col-md-3">{!! Form::bsText(null,null, 'Commodity', 'cargo_commodity', null, '') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Show rate', 'cargo_show_rate', null, '0.000') !!}</div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Show Total', 'cargo_show_total', null, '0.000') !!}</div>
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
            </form>
        </div>
    </div>
</div>
