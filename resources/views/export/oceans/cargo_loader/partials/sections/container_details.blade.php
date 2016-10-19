
<legend>Container Details</legend>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details'), clearTable('cargo_details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" onclick="clearTable('container_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="container_details">
    <thead>
    <tr>
        <th data-override="container_line" hidden></th>
        <th width="10%" data-override="equipment_type">Equipment type</th>
        <th width="10%" data-override="equipment_number">Equipment number.</th>
        <th width="10%" data-override="equipment_seal" >Equip. Seal</th>
        <th width="10%" data-override="order_number" >Order Number</th>
        <th width="10%" data-override="container_max_volume">Max volume</th>
        <th width="10%" data-override="container_loaded volume">Loaded Vol </th>
        <th width="10%" data-override="container_mas_weight">Max Weight</th>
        <th width="10%" data-override="container_loaded_weight">Loaded Weight</th>
        <th width="10%"/>
    </tr>
    </thead>
    <tbody></tbody>
</table>
<!--  WAREHOUSE -->
<table id="hidden_warehouse" class="hidden">
    <tbody></tbody>
</table>

<!--  CARGO DETAILS-->
<table id="hidden_cargo_details" class="hidden">
    <tbody></tbody>
</table>

<!--  HAZARDOUS -->
<table id="hidden_hazardous" class="hidden">
    <tbody></tbody>
</table>
