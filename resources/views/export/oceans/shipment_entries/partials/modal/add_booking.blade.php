
<div id="BookingDetails" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Booking Details</h4>
                </div>
                <div class="modal-body">
                    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                        <button type="button" class="btn btn-default" id="btn_booking_details" data-toggle="modal" data-target="#BookingModal" onclick="cleanModalFields('BookingModal')">
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger" onclick="clearTable('booking_details')">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                    <table class="table table-bordered table-condensed" id="booking_details">
                        <thead>
                        <tr>
                            <th hidden>?</th>
                            <th width="20%">Booking #</th>
                            <th width="50%">Shipment #</th>
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
                    <a id="booking_details_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                        <i class="icon ion-android-done-all"></i> Save data
                    </a>
                </div>

        </div>
    </div>
</div>