<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" class="btn btn-default" data-toggle="modal"  data-target="#ItemModal" onclick="cleanModalFields('ItemModal')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-danger" onclick="clearTable('items_details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>
<table class="table table-bordered table-condensed" id="items_details">
    <thead>
    <tr>
        <th hidden data-override="item_line">?</th>
        <th hidden data-override="item_pieces">Pieces</th>
        <th width="15%" data-override="item_description">Description</th>
        <th width="15%" data-override="item_vendor_name">Vendor</th>
        <th width="15%" data-override="item_origin">Origin</th>
        <th width="15%" data-override="item_exp_date">Exp. Date</th>
        <th width="15%"></th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

