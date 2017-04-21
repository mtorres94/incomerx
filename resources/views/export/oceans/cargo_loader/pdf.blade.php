<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cargo Loader {{ $cargo_loader->code }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 3.3.5 -->
{!! Html::style('css/metro-bootstrap.min.css') !!}

<!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
{!! Html::style('css/pdf.css') !!}

<!-- Font Awesome -->
{!! Html::style('css/font-awesome.min.css') !!}

<!-- Ionicons -->
    {!! Html::style('css/ionicons.min.css') !!}

    <style type="text/css">
        .page {
            overflow: hidden;
            page-break-after: always;
        }
    </style>
</head>

<body>
<div class="page">
    <div class="row row-padding">
        <div class="col-xs-6">
            <div class="company-info">
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
                <p>Phone: 305-5992703 / Fax: 305-5992925</p>
                <br/>
                <p>Printed on: {{ \Carbon\Carbon::now()->toDateString() }}</p>
                <p>Printed by: {{ Auth::user()->username }}</p>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="document-info pull-right">
                <h5><strong>LOADING PLAN</strong></h5>
                {!! DNS2D::getBarcodeSVG(
                $cargo_loader->code
                 , "QRCODE", 2, 2) !!}
                <p class="document_number"><strong>{{ $cargo_loader->code }}</strong></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
                <tr>
                    <td><p><strong>FILE #: </strong></p></td>
                    <td><p>{{ strtoupper($cargo_loader->shipment_id >0 ? $cargo_loader->shipment->code: "") }} </p></td>
                    <td><p><strong>ORIGIN: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->port_loading_id >0 ? $cargo_loader->loading->name : "") }}</p></td>
                    <td><p><strong>DATE: </strong></p></td>
                    <td><p> {{ $cargo_loader->date_today }}</p></td>
                </tr>
                <tr>
                    <td><p><strong>BOOKING #: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->booking_code)}}</p></td>
                    <td><p><strong>DEST: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->port_unloading_id >0 ? $cargo_loader->unloading->name : "") }}</p></td>
                    <td><p><strong>ETD: </strong></p></td>
                    <td><p> {{ $cargo_loader->departure_date }} </p></td>
                </tr>
                <tr>
                    <td><p><strong>CARRIER #: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->carrier_id>0 ? $cargo_loader->carrier->name : "") }} </p></td>
                    <td><p><strong>VIA: </strong></p></td>
                    <td><p> {{strtoupper($cargo_loader->place_delivery_id >0 ? $cargo_loader->delivery->name : "")}}</p></td>
                    <td><p><strong>ETA: </strong></p></td>
                    <td><p> {{$cargo_loader->arrival_date}} </p></td>
                </tr>
                <tr>
                    <td><p><strong>VESSEL: </strong></p></td>
                    <td><p> {{strtoupper($cargo_loader->vessel_name) }} </p></td>
                    <td><p><strong>VOYAGE: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->voyage_name) }}</p></td>
                    <td><p><strong>CUT OFF: </strong></p></td>
                    <td><p> {{ $cargo_loader->equipment_cut_off_date }}</p></td>
                </tr>
                @foreach( $cargo_loader->container_details as $detail)
                    <tr>
                        <td><p><strong>EQUIPMENT TYPE: </strong></p></td>
                        <td>{{ strtoupper($detail->equipment_type_id > 0 ? $detail->equipment_type->code : "") }}</td>
                        <td><p><strong>EQUIPMENT NUMBER: </strong></p></td>
                        <td>{{ strtoupper($detail->container_number) }}</td>
                        <td><p><strong>SEAL NUMBER: </strong></p></td>
                        <td>{{ strtoupper($detail->container_seal_number )}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <?php
        $total_pieces = 0;
        $total_weight = 0;
        $total_cubic = 0;
    ?>
    <div class="row">
        <div class="col-xs-12">
            @foreach($cargo_loader->receipt_entries as $receipt)
                <table class="table resume-table">
                    <tbody>
                    <tr>
                        <td width="5%"><strong>WR#</strong></td>
                        <td width="10%" >{{ $receipt->code }}</td>
                        <td width="10%" ><strong> WR LOC</strong></td>
                        <td width="10%">{{ strtoupper($receipt->location_origin_id > 0? $receipt->origin->name : "") }}</td>
                        <td width="10%"><strong>SHIPPER: </strong></td>
                        <td width="20%"> {{ strtoupper($receipt->shipper_id >0 ? $receipt->shipper->name : "")}}</td>
                        <td width="10%"><strong>CONSIGNEE: </strong></td>
                        <td width="20%"> {{ strtoupper($receipt->consignee_id >0 ? $receipt->consignee->name : "")}}</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table resume-table">
                    <thead>
                    <tr>
                        <th width="5%">PCS</th>
                        <th width="10%">TYPE</th>
                        <th width="15%">DIMS</th>
                        <th width="10%">WEIGHT</th>
                        <th width="10%">CUBIC</th>
                        <th width="15%">LOCATION</th>
                        <th width="15%">BIN</th>
                        <th width="10%">PICKED</th>
                        <th width="10%">LOADED</th>
                        <th width="10%">POSITION</th>
                        <th width="5%">HZ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $receipt->cargo_details as $cargo_detail)
                        <tr>
                            <td width="5%">{{ $cargo_detail->quantity  }}</td>
                            <td width="10%">{{ strtoupper($cargo_detail->cargo_type_id >0 ? $cargo_detail->cargo_type->code : "") }}</td>
                            <td width="15%">{{ round($cargo_detail->length)  }}x {{ round($cargo_detail->width)  }}x {{ round($cargo_detail->height)  }}</td>
                            <td width="10%">{{ $cargo_detail->total_weight  }}</td>
                            <td width="10%">{{ $cargo_detail->cubic  }}</td>
                            <td width="15%">{{ strtoupper($cargo_detail->location_id >0 ? $cargo_detail->location->name : "") }}</td>
                            <td width="15%">{{ strtoupper($cargo_detail->location_bin_id ) }}</td>
                            <td width="10%"></td>
                            <td width="10%"></td>
                            <td width="10%"></td>
                            <td width="5%"></td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td align="right" colspan="2"><strong>TOTAL PIECES: </strong></td>
                        <td align="left">{{ $receipt->sum_pieces }}</td>
                        <td ></td>
                        <td align="right" colspan="2"><strong>TOTAL WEIGHT: </strong></td>
                        <td align="left">{{ $receipt->sum_weight}}</td>
                        <td ></td>
                        <td  align="right" colspan="2"><strong>TOTAL CUBIC: </strong></td>
                        <td  align="left">{{ $receipt->sum_cubic}}</td>
                    </tr>
                    </tfoot>
                </table>
                <br>
                <?php
                    $total_pieces += $receipt->sum_pieces;
                    $total_weight += $receipt->sum_weight;
                    $total_cubic += $receipt->sum_cubic;
                ?>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p style="font-size: 10px;" align="center">HAZARDOUS MATERIAL CONTACT INFORMATION</p>
            <table class="table resume-table">
                @foreach($cargo_loader->container_details as $details)
                    <tr>
                        <td width="20%">CONTACT: &nbsp;</td>
                        <td width="40%">{{ strtoupper($detail->container_hazardous_contact) }}</td>
                        <td width="20%">PHONE: &nbsp;</td>
                        <td width="40%">{{ $detail->container_hazardous_phone }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <p style="font-size: 10px;" align="center">COMMENTS</p>
            <p style="font-size: 8px;" align="left">{{ strtoupper($cargo_loader->inland_comments) }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6">
           <table class="table resume-table">
               <tr>
                   <td height="15px" width="20%" style="border-top: 1px solid; border-left: 1px solid; "><strong>PIECES</strong></td>
                   <td  width="30%" style="border-top: 1px solid; "><strong>{{ $total_pieces }}</strong></td>
                   <td  width="20%" style="border-top: 1px solid; "><strong>WEIGHT:</strong></td>
                   <td  width="30%" style="border-top: 1px solid; border-right: 1px solid;"><strong>{{ $total_weight }}</strong></td>
               </tr>
               <tr>
                   <td height="15px" style="border-bottom: 1px solid; border-left: 1px solid;"></td>
                   <td  style="border-bottom: 1px solid;"></td>
                   <td  style="border-bottom: 1px solid;"><strong>CUBIC:</strong></td>
                   <td  style="border-bottom: 1px solid; border-right: 1px solid;"><strong>{{ $total_cubic }}</strong></td>
               </tr>
           </table>
        </div>
    </div>
</div>
</body>

</html>