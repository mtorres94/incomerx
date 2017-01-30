<div id="CreateHouse" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Bill of Lading</h4>
                <h5 class="modal-title">Select items in the list to create a HBL</h5>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">{!! Form::bsSelect('col-md-3', 'col-md-9', ' GROUP BY', 'group_by', array( '1' => 'SHIPPER', '2' => 'CONSIGNEE', '3' => 'ONE BY ONE'), null) !!}</div>
                    </div>
                </div>
                <table class="table table-bordered table-condensed" id="load_warehouses">
                    <thead>
                    <tr>
                        <th data-override="hbl_line" hidden></th>
                        <th width="5%" data-override="hbl_check"></th>
                        <th width="10%" data-override="hbl_wr_number">WHR /HBL #</th>
                        <th width="25%" data-override="hbl_date_in">Description</th>
                        <th width="10%" data-override="hbl_consignee_name">Pieces</th>
                        <th width="10%" data-override="hbl_consignee_name">Weight</th>
                        <th width="10%" data-override="hbl_consignee_name">Cubic</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="createHouse_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Create B/L
                </a>
            </div>
        </div>
    </div>
</div>