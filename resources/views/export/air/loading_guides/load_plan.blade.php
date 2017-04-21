<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $loading_guide->code }}</title>
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

@foreach($loading_guide->container as $container)
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
                <h5><strong>LOAD PLAN</strong></h5>
                <div style="text-align: center;">
                    {!! DNS2D::getBarcodeSVG(
                     $loading_guide->code
                    , "QRCODE", 2, 2) !!}
                </div>
                <p class="document_number" style="align-content: center"><strong>{{ $loading_guide->code }}</strong></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">

            <table class="table header-table">
                <tr>
                    <td><p><strong>FILE #: </strong></p></td>
                    <td><p>{{ strtoupper($loading_guide->shipment_id >0 ? $loading_guide->shipment->code: "") }} </p></td>
                    <td><p><strong>ORIGIN: </strong></p></td>
                    <td><p> {{ strtoupper($loading_guide->origin_id >0 ? $loading_guide->origin->name : "") }}</p></td>
                    <td><p><strong>DATE: </strong></p></td>
                    <td><p> {{ $loading_guide->date}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>BOOKING #: </strong></p></td>
                    <td><p> {{ strtoupper($loading_guide->booking_code)}}</p></td>
                    <td><p><strong>DEST: </strong></p></td>
                    <td><p> {{ strtoupper($loading_guide->destination_id >0 ? $loading_guide->destination->name : "") }}</p></td>
                    <td><p><strong>ETD: </strong></p></td>
                    <td><p> {{ $loading_guide->departure_date }} </p></td>
                </tr>
                <tr>
                    <td><p><strong>CARRIER #: </strong></p></td>
                    <td><p> {{ strtoupper($loading_guide->carrier_id>0 ? $loading_guide->carrier->name : "") }} </p></td>
                    <td><p><strong>VIA: </strong></p></td>
                    <td><p> {{strtoupper($loading_guide->via_id >0 ? $loading_guide->via->name : "")}}</p></td>
                    <td><p><strong>ETA: </strong></p></td>
                    <td><p> {{$loading_guide->arrival_date}} </p></td>
                </tr>
                <tr>
                    <td><p><strong>FLIGHT: </strong></p></td>
                    <td><p> {{ $loading_guide->flight}}</p></td>
                    <td><p><strong>CUT OFF: </strong></p></td>
                    <td><p> {{ $loading_guide->cut_off_date }}</p></td>
                    <td><p><strong>ORDER NUMBER: </strong></p></td>
                    <td><p> {{ $container->order_number }}</p></td>
                </tr>
            </table>

            @foreach($loading_guide->receipt_entry as $receipt_entry)
                @if($receipt_entry->line == $container->line)
                    <table class="table resume-table">
                        <tbody>
                        <tr>
                            <td width="3%" valign="bottom"><strong>WR#</strong></td>
                            <td width="10%" valign="bottom">{{ $receipt_entry->code }}</td>
                            <td width="8%" valign="bottom"><strong> WR LOC</strong></td>
                            <td width="8%" valign="bottom">{{ strtoupper($receipt_entry->warehouse_id > 0? $receipt_entry->warehouse->code : "") }}</td>
                            <td width="15%" valign="bottom"><strong>SHIPPER/ CONSIGNEE: </strong></td>
                            <td width="40%" valign="bottom"> {{ strtoupper($receipt_entry->shipper_id >0 ? $receipt_entry->shipper->name : "")}}/ {{ strtoupper($receipt_entry->consignee_id >0 ? $receipt_entry->consignee->name : "")}}</td>

                        </tr>
                        </tbody>
                    </table>
                    <table class="table resume-table">
                        <thead>
                        <tr>
                            <th width="10%">PCS</th>
                            <th width="10%">TYPE</th>
                            <th width="10%">WEIGHT</th>
                            <th width="10%">VOLUME</th>
                            <th width="15%">LOCATION</th>
                            <th width="15%">BIN</th>
                            <th width="10%">PICKED</th>
                            <th width="10%">LOADED</th>
                            <th width="10%">POSITION</th>
                            <th width="5%">HZ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $receipt_entry->cargo_details as $detail)
                            <tr>
                                <td width="10%">{{ $detail->quantity  }}</td>
                                <td width="10%">{{ strtoupper($detail->cargo_type_id >0 ? $detail->cargo_type->code : "") }}</td>
                                <td width="10%">{{ $detail->total_weight  }}</td>
                                <td width="10%">{{ $detail->volume_weight  }}</td>
                                <td width="15%">{{ strtoupper($detail->location_id >0 ? $detail->location->name : "") }}</td>
                                <td width="15%">{{ strtoupper($detail->location_bin_id ) }}</td>
                                <td width="10%"></td>
                                <td width="10%"></td>
                                <td width="10%"></td>
                                <td width="5%"></td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="2" align="right"><strong>TOTAL PIECES: </strong></td>
                            <td align="left">{{ $receipt_entry->sum_pieces }}</td>
                            <td colspan="2" align="right"><strong>TOTAL WEIGHT: </strong></td>
                            <td align="left">{{ $receipt_entry->sum_weight}}</td>
                            <td colspan="2" align="right"><strong>TOTAL CUBIC: </strong></td>
                            <td colspan="2" align="left">{{ $receipt_entry->sum_cubic}}</td>
                        </tr>
                        </tfoot>
                    </table>
                @endif
                <br>

            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table" width="30%">
            <tr>
                <td width="10%"><p><strong>TOTAL PCS: </strong></p></td>
                <td width="10%"><p>{{ $container->pieces_load }}</p></td>
                <td width="10%"><p><strong>WEIGHT: </strong></p></td>
                <td width="10%"><p>{{ $container->weight_load }}</p></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><p><strong>VOL. WEIGHT: </strong></p></td>
                <td><p>{{ $container->volume_weight }}</p></td>
            </tr>
        </table>
        </div>
    </div>

        </div>
@endforeach


</body>

</html>