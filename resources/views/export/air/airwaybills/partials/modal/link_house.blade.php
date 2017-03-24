<div id="link_house" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Link Houses</h4>
                <h5 class="modal-title">Select houses in the list to create an MAWB</h5>
            </div>

            <div class="modal-body">

                <table class="table table-bordered table-condensed" id="houses">
                    <thead>
                    <tr>

                        <th width="5%" ></th>
                        <th width="15%" >HAWB #</th>
                        <th width="10%" >Date</th>
                        <th width="10%" >Status</th>
                        <th width="10%" >Pieces</th>
                        <th width="10%">Weight</th>
                        <th width="15%" >Destination</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">{!! Form::bsCheck('col-md-1', 'col-md-7', 'Select/ Deselect all', 'select_all') !!}</div>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="link_house_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Link selected
                </a>
            </div>
        </div>
    </div>
</div>