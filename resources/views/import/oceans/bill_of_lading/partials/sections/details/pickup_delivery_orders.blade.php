<div class="row">

            <div class="form-horizontal">
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" id="btn_pickup" class="btn btn-default" data-toggle="modal" data-target="#Pickup_Details" onclick="cleanModalFields('Pickup_Details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger"  onclick="clearTable('pickup_details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="pickup_details">
                    <thead>
                    <tr>
                        <th data-override="cargo_line" hidden></th>
                        <th width="10%" data-override="order_number">Order Number</th>
                        <th width="5%" data-override="shipper_name">Shipper</th>
                        <th width="15%" data-override="consignee_name">Consignee</th>
                        <th width="5%" data-override="schedule_date">Sched. Date</th>
                        <th width="10%" data-override="carrier_name">Carrier Name</th>
                        <th width="10%" data-override="driver_name">Driver Name</th>
                        <th width="10%" data-override="freight_charges">Fre. Charges</th>
                        <th width="10%" data-override="status">Status</th>
                        <th width="12%"/>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>

    </div>