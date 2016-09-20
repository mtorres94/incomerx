<div class="row">
    <div class="col-md-5">{!! Form::bsText(null, null, 'Serial Number', 'part_info_serial_number', null, ' ') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Barcode', 'part_info_barcode', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsText(null, null, 'Model', 'part_info_Model', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsComplete(null, null, 'Commodity', 'part_info_commodity_id', 'part_info_commodity_name', Request::get('term'), null, 'Search Commodity...') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsText(null, null, 'PRO Number', 'part_info_pro_number', null, ' ') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Project', 'part_info_project', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsText(null, null, 'P.O. Number', 'part_info_po_number', null, ' ') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'Inv. Number', 'part_info_inv_number', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-5">{!! Form::bsText(null, null, 'LOT Number', 'part_info_lot_number', null, ' ') !!}</div>
    <div class="col-md-4">{!! Form::bsText(null, null, 'SKU Number', 'part_info_sku_number', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-9"> {!! Form::bsText(null, null, 'Destination point', 'part_info_destination_point', null, '') !!}</div>
</div>
<div class="row">
    <div class="col-md-9">{!! Form::bsText(null, null, 'Attention', 'part_info_attention', null, '') !!}</div>
</div>
