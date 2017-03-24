<div id="LoadWarehouse" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Warehouse Linking</h4>
                <h5 class="modal-title">Select warehouse or vehicle to link</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6"><h4>Search Options</h4></div>
                </div>

                <div class="row">
                    {!! Form::hidden('pick_cargo_id', null, ['id' => 'pick_cargo_id', 'class' => 'form-control input-sm']) !!}

                    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Search by', 'pick_search_type', array(
                        '1' => 'Warehouse #',
                        '2' => 'Division',
                        '3' => 'Shipper',
                        '4' => 'Consignee',
                        '5' => 'Agent',
                        '6' => 'Third Party',
                        '7' => 'Date in'
                    ), 'Search by') !!}</div>
                    <div class="col-md-6">{!! Form::bsComplete(null, null, 'For: ', 'pick_search_for_id', 'pick_search_for_name', Request::get('term'), null,  ' ') !!}</div>

                </div>
              <div class="row">
                  <div class="col-md-12">
                      <table class="table table-bordered table-condensed" id="load_warehouse_details">
                          <thead>
                          <tr>
                              <th hidden></th>
                              <th width="5%" ></th>
                              <th width="10%" >#WR</th>
                              <th width="10%" >Date in</th>
                              <th width="15%" >Shipper</th>
                              <th width="15%" >Consignee</th>
                              <th width="5%" >Qty.</th>
                              <th width="10%" >Weight</th>
                              <th width="10%" >Cubic</th>
                              <th width="10%" >Hazardous</th>
                              <th width="10%" >Destination</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                  </div>
              </div>
                    <div class="row">

                        <div class="col-md-2">{!! Form::bsText(null,null, 'Linked', 'pick_linked', null, '') !!} </div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Unlinked', 'pick_unlinked', null, '') !!} </div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Link Qty', 'pick_link_qty', null, '') !!} </div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Weight', 'pick_weight', null, '') !!} </div>
                        <div class="col-md-2">{!! Form::bsText(null,null, 'Cubic', 'pick_cubic', null, '') !!} </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">{!! Form::bsCheck('col-md-1', 'col-md-2','Autocheck', 'autocheck') !!}</div>
                        <div class="col-md-7">{!! Form::bsCheck('col-md-1', 'col-md-6', 'Select / Deselect All', 'select_all') !!}</div>

                    </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="pick_cargo_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Link Selected Warehouse
                </a>
            </div>
        </div>
    </div>
</div>
