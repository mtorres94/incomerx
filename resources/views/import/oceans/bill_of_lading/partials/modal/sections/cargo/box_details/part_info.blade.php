<div class="row">
    <div class="col-md-5">{!! Form::bsText('col-md-5', 'col-md-7', 'Serial Number', 'box_serial_number', null, ' ') !!}</div>
    <div class="col-md-4">{!! Form::bsText('col-md-5', 'col-md-7', 'Barcode', 'box_barcode', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsText('col-md-3', 'col-md-9', 'Model', 'box_Model', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Commodity', 'box_commodity_id', 'box_commodity_name', Request::get('term'), null, 'Search Commodity...') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsText('col-md-5', 'col-md-7', 'PRO Number', 'box_pro_number', null, ' ') !!}</div>
    <div class="col-md-4">{!! Form::bsText('col-md-5', 'col-md-7', 'Project', 'box_project', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsText('col-md-5', 'col-md-7', 'P.O. Number', 'box_po_number', null, ' ') !!}</div>
    <div class="col-md-4">{!! Form::bsText('col-md-5', 'col-md-7', 'Inv. Number', 'box_inv_number', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsText('col-md-5', 'col-md-7', 'LOT Number', 'box_lot_number', null, ' ') !!}</div>
    <div class="col-md-4">{!! Form::bsText('col-md-5', 'col-md-7', 'SKU Number', 'box_sku_number', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-9"> {!! Form::bsText('col-md-3', 'col-md-9', 'Destination point', 'box_destination_point', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsText('col-md-3', 'col-md-9', 'Attention', 'box_attention', null, '') !!}</div>
</div>
