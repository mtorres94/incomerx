<legend>Container Details</legend>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#container_details" onclick="cleanModalFields('container_details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" onclick="clearTable('container_table')" >
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="container_table">
    <thead>
    <tr>
        <th hidden></th>
        <th width="10%" >Equipment type</th>
        <th width="10%" >Equipment or Container Number.</th>
        <th width="10%" >Seal Number</th>
        <th width="10%"/>
    </tr>
    </thead>
    <tbody>
    @if(isset($invoice))
        @foreach($invoice->container_details as $detail)
         <tr id=" {{ $detail->line }}">
             {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
             {!! Form::bsRowTd($detail->line, 'equipment_type_id', $detail->equipment_type_id, true) !!}
             {!! Form::bsRowTd($detail->line, 'equipment_type_code', strtoupper($detail->equipment_type_id > 0 ? $detail->equipment_type->code : ""), false) !!}
             {!! Form::bsRowTd($detail->line, 'container_number', $detail->container_number, false) !!}
             {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->seal_number, false) !!}
         </tr>
        @endforeach
    @endif
    </tbody>
</table>