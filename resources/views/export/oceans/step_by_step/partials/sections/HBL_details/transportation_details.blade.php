<fieldset>
    <legend>Transportation Plans</legend>
    <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
        <button type="button" id="btn-transportation"class="btn btn-default" data-toggle="modal" data-target="#TransportationDetails" onclick="cleanModalFields('TransportationDetails')">
            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-danger" onclick="clearTable('transportation_details')">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
    </div>
    <table class="table table-bordered table-condensed" id="transportation_details">
        <thead>
        <tr>
            <th  data-override="transportation_line" hidden></th>
            <th width="5%" data-override="transportation_leg">Leg</th>
            <th width="5%" data-override="transportation_mode">Mode</th>
            <th  data-override="transportation_carrier_id" hidden></th>
            <th width="20%"data-override="transportation_carrier">Carrier</th>
            <th  data-override="transportation_loading_id" hidden></th>
            <th width="10%"data-override="transportation_loading">Loading</th>
            <th  data-override="transportation_unloading_id" hidden></th>
            <th width="10%"data-override="transportation_unloading">Unloading</th>
            <th width="10%"data-override="transportation_ETD">ETD</th>
            <th width="10%"data-override="transportation_ETA">ETA</th>
            <th width="10%"data-override="transportation_status">Status</th>
            <th width="10%"data-override="transportation_amount">Amount</th>
            <th width="10%"/>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="pull-right" >
        <div class="col-md-9">{!! Form::bsText(null,null, 'Amount', 'transportation_plans_amount', null, '0.000') !!}</div>
    </div>

</fieldset>
