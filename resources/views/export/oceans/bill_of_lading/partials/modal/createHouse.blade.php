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

                <table class="table table-bordered table-condensed" id="load_warehouses">
                    <thead>
                    <tr>

                        <th width="3%" >{!! Form::bsCheck('', 'select_all') !!}</th>
                        <th width="10%" >WHR /HBL #</th>
                        <th width="25%" >Description</th>
                        <th width="10%" >Pieces</th>
                        <th width="10%">Weight</th>
                        <th width="10%" >Cubic</th>
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
                    <i class="icon ion-android-done-all"></i> Link selected
                </a>
            </div>
        </div>
    </div>
</div>