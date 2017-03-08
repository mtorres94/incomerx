<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ strtoupper($shipment_entry->code) }}</title>
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
@foreach($shipment_entry->booking as $booking)


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
                    <p class="code-bar">{{ $shipment_entry->code }}</p>
                    <p class="document_number"><strong>{{ strtoupper($shipment_entry->code) }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table" border="1">
                <tbody>
                    <tr>
                        <td width="33%" ><p><strong>MBL#</strong><br> {{ strtoupper($shipment_entry->bill_of_lading->first()->mbl_code) }}</p></td>
                        <td width="33%" ><p><strong>SHIPLINE:</strong><br> {{ strtoupper($shipment_entry->carrier_id > 0 ? $shipment_entry->carrier->name : "") }}</p></td>
                        <td width="34%" ><p></p></td>
                    </tr>
                    <tr>
                        <td rowspan="2"><p><strong>AGENT:</strong><br>
                            {{ strtoupper($shipment_entry->agent_id > 0 ? $shipment_entry->agent->name : "") }}<br>
                            {{ strtoupper($shipment_entry->agent_id > 0 ? $shipment_entry->agent->address : "") }}<br>
                            {{ strtoupper($shipment_entry->agent_id > 0  ? $shipment_entry->agent->city : "") }} ,
                            {{ strtoupper(($shipment_entry->agent_id > 0 and $shipment_entry->agent->state_id > 0) ? $shipment_entry->agent->state->code : "") }}<br>
                            </p></td>
                        <td><p><strong>VESSEL:</strong><br>{{ strtoupper($shipment_entry->vessel_name) }}</p></td>
                        <td><p><strong>PORT OF LOADING: </strong><br>{{ strtoupper($shipment_entry->port_loading_id > 0 ? $shipment_entry->port_loading->name : "") }}</p></td>
                    </tr>
                    <tr>
                        <td><p><strong>VOYAGE:</strong><br>{{ strtoupper($shipment_entry->voyage_name) }}</p></td>
                        <td><p><strong>PORT OF DISCHARGE: </strong><br>{{ strtoupper($shipment_entry->port_unloading_id > 0 ? $shipment_entry->port_unloading->name : "") }}</p></td>
                    </tr>
                    <tr>
                        <td><p><strong>DEPARTURE DATE:</strong><br>{{ $shipment_entry->departure_date }}</p></td>
                        <td>
                            <table class="table resume-table">
                                <tr>
                                    <td><p><strong>FROM:</strong><br>{{ strtoupper($shipment_entry->port_loading_id > 0 ? $shipment_entry->port_loading->name : "") }}</p></td>
                                    <td><p><strong>TO:</strong><br>{{ strtoupper($shipment_entry->port_unloading_id > 0 ? $shipment_entry->port_unloading->name : "") }}</p></td>
                                </tr>
                            </table>
                        </td>
                        <td><p><strong>ULTIMATE DESTINATION: </strong><br>{{ strtoupper($shipment_entry->place_delivery_id > 0 ? $shipment_entry->place_delivery->name : "") }}</p></td>
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
                @foreach ($shipment_entry->bill_of_lading as $detail)
                    @if ($detail->bl_class <= 2)

                     @foreach($detail->cargo as $cargo)
                     <tr>
                         <td>{{ $detail->code }}</td>
                         <td>{{ $cargo->cargo_pieces}}</td>
                         <td>{{ $cargo->cargo_weight_k}} Kgs<br>{{ $cargo->cargo_weight_l}} Lbs</td>
                         <td>{{ $cargo->cargo_cubic_k}} Kgs<br>{{ $cargo->cargo_cubic_l}} Lbs</td>
                         <td>{{ $cargo->cargo_description }}</td>
                         <td>{{ $detail->container->first()->container_number }}</td>
                         <td>{{ $detail->container->first()->container_seal_number }}</td>
                         <td>{{ $detail->container->first()->container_comments }}</td>
                     </tr>
                     @endforeach
                     <tr>
                         <td><p><strong>SHIPPER: </strong></p></td>
                         <td colspan="2">
                             <p>{{ strtoupper($detail->shipper_id > 0 ? $detail->shipper->name : "") }}<br>
                                {{ strtoupper($detail->shipper_address) }}<br>
                                {{ strtoupper($detail->shipper_city) }} ,
                                {{ strtoupper($detail->shipper_state_id > 0 ? $detail->shipper_state->code : "") }}<br>
                             </p>
                         </td>
                         <td><p><strong>CONSIGNEE: </strong></p></td>
                         <td>
                             <p>{{ strtoupper($detail->consignee_id > 0 ? $detail->consignee->name : "") }}<br>
                                 {{ strtoupper($detail->consignee_address) }}<br>
                                 {{ strtoupper($detail->consignee_city) }} ,
                                 {{ strtoupper($detail->consignee_state_id > 0 ? $detail->consignee_state->code : "") }}<br>
                             </p>
                         </td>
                         <td><p><strong>NOTIFY: </strong></p></td>
                         <td colspan="2">
                             <p>{{ strtoupper($detail->notify_id > 0 ? $detail->notify->name : "") }}<br>
                                 {{ strtoupper($detail->notify_address) }}<br>
                                 {{ strtoupper($detail->notify_city) }}
                                 {{ strtoupper($detail->notify_state_id > 0 ? ','.$detail->notify_state->code : "") }}<br>
                             </p>
                         </td>
                     </tr>
                    @endif
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><p><strong>TOTAL</strong></p></td>
                        <td>
                            <strong>{{ $shipment_entry->hbl_pieces }} Lbs</strong>
                        </td>
                        <td>
                            <strong>{{ $shipment_entry->hbl_actual_weight }} Lbs</strong>
                            <strong>{{ round($shipment_entry->hbl_actual_weight *  0.453592, 3) }} Kgs</strong>
                        </td>
                        <td>
                            <strong>{{ $shipment_entry->hbl_charge_weight }} Lbs</strong>
                            <strong>{{ round($shipment_entry->hbl_charge_weight * 0.453592, 3) }} Kgs</strong>
                        </td>
                    </tr>
                </tfoot>

            </table>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel-body">
                <p><strong>COMMENTS: </strong></p>
                <p> {{ strtoupper($shipment_entry->shipment_comments )}}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
</body>

</html>