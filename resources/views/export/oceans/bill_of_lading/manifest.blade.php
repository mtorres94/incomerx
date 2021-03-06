<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ strtoupper($bill_of_lading->code) }}</title>
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
</head>

<body>
<div class="container-fluid">
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
            <div class="row">
                <div class="document-info pull-right">
                    <h5><strong>OCEAN CARGO MANIFEST</strong></h5>
                    {!! DNS2D::getBarcodeSVG(
                 ($bill_of_lading->shipment_id >0 ? $bill_of_lading->shipment->code : "" )
                 , "QRCODE", 2, 2) !!}
                    <p class="document_number"><strong>{{ ($bill_of_lading->shipment_id >0 ? $bill_of_lading->shipment->code : "" ) }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table table-bordered table-condensed" >
                <tbody>
                <tr>
                    <td width="33%" ><p><strong>MBL#</strong><br> {{ strtoupper($bill_of_lading->mbl_code) }}</p></td>
                    <td width="33%" ><p><strong>SHIPLINE:</strong><br> {{ strtoupper($bill_of_lading->carrier_id > 0 ? $bill_of_lading->carrier->name : "") }}</p></td>
                    <td width="34%" ><p></p></td>
                </tr>
                <tr>
                    <td rowspan="2"><p><strong>AGENT:</strong><br>
                            {{ strtoupper($bill_of_lading->agent_id > 0 ? $bill_of_lading->agent->name : "") }}<br>
                            {{ strtoupper( $bill_of_lading->agent_address) }}<br>
                            {{ strtoupper($bill_of_lading->agent_city) }}
                            {{ strtoupper($bill_of_lading->agent_state_id > 0 ? ",".$bill_of_lading->agent_state->name : "") }}<br>
                        </p></td>
                    <td><p><strong>VESSEL:</strong><br>{{ strtoupper($bill_of_lading->vessel_name) }}</p></td>
                    <td><p><strong>PORT OF LOADING: </strong><br>{{ strtoupper($bill_of_lading->port_loading_id > 0 ? $bill_of_lading->loading->name : "") }}</p></td>
                </tr>
                <tr>
                    <td><p><strong>VOYAGE:</strong><br>{{ strtoupper($bill_of_lading->voyage_name) }}</p></td>
                    <td><p><strong>PORT OF DISCHARGE: </strong><br>{{ strtoupper($bill_of_lading->port_unloading_id > 0 ? $bill_of_lading->unloading->name : "") }}</p></td>
                </tr>
                <tr>
                    <td><p><strong>DEPARTURE DATE:</strong><br>{{ $bill_of_lading->departure_date }}</p></td>
                    <td>
                        <table class="table header-table">
                            <tr>
                                <td width="50%"><p><strong>FROM:</strong><br>{{ strtoupper($bill_of_lading->port_loading_id > 0 ? $bill_of_lading->loading->name : "") }}</p></td>
                                <td width="50%"><p><strong>TO:</strong><br>{{ strtoupper($bill_of_lading->port_unloading_id > 0 ? $bill_of_lading->unloading->name : "") }}</p></td>
                            </tr>
                        </table>
                    </td>
                    <td><p><strong>ULTIMATE DESTINATION: </strong><br>{{ strtoupper($bill_of_lading->place_delivery_id > 0 ? $bill_of_lading->place_delivery->name : "") }}</p></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table condensed-table">
                <thead>
                <tr>
                    <th width="10%">B/L#</th>
                    <th width="5%">PCS</th>
                    <th width="10%">WEIGHT</th>
                    <th width="10%">VOLUME</th>
                    <th width="25%">DESCRIPTION OF GOODS</th>
                    <th width="10%">CONTAINER</th>
                    <th width="10%">SEAL</th>
                    <th width="20%">COMMENTS</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($bill_of_lading->cargo as $detail)

                        <td>{{ $bill_of_lading->code }}</td>
                        <td>{{ $detail->cargo_pieces }}</td>

                        <td>{{ $detail->cargo_weight_k}} &nbsp; Kgs<br>{{ $detail->cargo_gross_weight}}&nbsp;Lbs</td>
                        <td>{{ $detail->cargo_cubic_k}} &nbsp; Cbm<br>{{ $detail->cargo_cubic}}&nbsp;Cft</td>
                        <td>
                            @if($bill_of_lading->bl_class == 3)
                                <?php echo nl2br(str_replace(",", "\n", $detail->cargo_description)); ?>
                            @else
                                @for ($x =0; $x < count($result); $x++)
                                    <?php  echo nl2br($result[$x]['warehouse_code']." ". $result[$x]['detail']."\n"); ?>
                                @endfor
                            @endif
                        </td>
                    @endforeach
                        <td><p> {{ strtoupper($bill_of_lading->container->first()->container_number) }}</p></td>
                        <td><p> {{ strtoupper($bill_of_lading->container->first()->container_seal_number) }}</p></td>
                        <td><p> {{ strtoupper($bill_of_lading->container->first()->container_comments) }}</p></td>
                </tr>
                <tr>
                    <td><p><strong>SHIPPER: </strong></p></td>
                    <td colspan="2">
                        <p>
                            {{ strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->name : "") }}<br>
                            {{ strtoupper($bill_of_lading->shipper_address) }}<br>
                            {{ strtoupper($bill_of_lading->shipper_city) }}<br>
                            {{ strtoupper($bill_of_lading->shipper_state_id > 0 ? ", ".$bill_of_lading->shipper_state->code : "") }}
                        </p>
                    </td>
                    <td><p><strong>CONSIGNEE: </strong></p></td>
                    <td>
                        <p>
                            {{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "") }}<br>
                            {{ strtoupper($bill_of_lading->consignee_address) }}<br>
                            {{ strtoupper($bill_of_lading->consignee_city) }}<br>
                            {{ strtoupper($bill_of_lading->consignee_state_id > 0 ? ", ".$bill_of_lading->consignee_state->code : "") }}
                        </p>
                    </td>
                    <td><p><strong>NOTIFY: </strong></p></td>
                    <td colspan="2">
                        <p>
                            {{ strtoupper($bill_of_lading->notify_id > 0 ? $bill_of_lading->notify->name : "") }}<br>
                            {{ strtoupper($bill_of_lading->notify_address) }}<br>
                            {{ strtoupper($bill_of_lading->notify_city) }}<br>
                            {{ strtoupper($bill_of_lading->notify_state_id > 0 ? ", ".$bill_of_lading->notify_state->code : "") }}<br>
                        </p>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td><p><strong>TOTALS</strong></p></td>
                    <td>
                        <strong>{{ $bill_of_lading->total_pieces }} </strong>
                    </td>
                    <td>
                        <strong>{{ $bill_of_lading->total_weight_lbs }} Lbs</strong><br>
                        <strong>{{ round($bill_of_lading->total_gross_weight *  0.453592, 3) }} Kgs</strong>
                    </td>
                    <td>
                        <strong>{{ $bill_of_lading->total_charge_weight }} Lbs</strong><br>
                        <strong>{{ round($bill_of_lading->total_charge_weight * 0.453592, 3) }} Kgs</strong>
                    </td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel-body" align="center">
                <p><strong>WE CERTIFY THAT ALL INFORMATION IN THIS CARGO MANIFEST IS THE SAME EXACT COPY OF THE CORRESPONDING ORIGINALS.</strong></p>
            </div>
        </div>
    </div>
</div>
</body>

</html>