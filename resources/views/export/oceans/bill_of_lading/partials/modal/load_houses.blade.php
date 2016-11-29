<div id="LoadHouses" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Bill of Lading</h4>
                <h5 class="modal-title">Select items in the list to create a MBL</h5>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-condensed" id="load_houses">
                    <thead>
                    <tr>
                        <th data-override="mbl_line" hidden></th>
                        <th width="5%" data-override="mbl_check"></th>
                        <th width="15%" data-override="mbl_wr_number">#WR</th>
                        <th width="15%" data-override="mbl_date_in">Date in</th>
                        <th width="15%" data-override="mbl_shipper_name" >Shipper</th>
                        <th width="15%" data-override="mbl_consignee_name">Consignee</th>
                        <th width="15%" data-override="mbl_consignee_name">Container</th>
                        <th width="15%"></th>

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
<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 24/11/2016
 * Time: 15:11
 */