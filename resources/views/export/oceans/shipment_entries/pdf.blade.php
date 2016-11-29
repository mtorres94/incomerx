<!DOCTYPE html>
<html lang="en">
<head>
    <title>EOB- {{ strtoupper($shipment_entry->booking_code) }}</title>
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
                    <h5><strong>BOOKING CONFIRMATION</strong></h5>
                    <p class="code-bar">{{ $shipment_entry->booking_code }}</p>
                    <p class="document_number"><strong>BOOKING # {{ strtoupper($shipment_entry->booking_code) }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">BOOKING # {{ strtoupper($shipment_entry->booking_code )}}</div>
                        <div class="panel-body">
                            <table class="table resume-table">
                                <tr><td width="20%"><strong>DATE: </strong></td><td>{{ $shipment_entry->date_today }}</td></tr>
                                <tr><td width="20%"><strong>FILE #: </strong></td><td>{{ ($shipment_entry->shipment_id > 0 ? $shipment_entry->shipment->code : "") }}</td></tr>
                                <tr><td width="20%"><strong>REFERENCE: </strong></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">NOTIFY</div>
                        <div class="panel-body">
                            <table class="table resume-table">
                                <tr><td width="20%"><strong>NAME: </strong></td><td>{{ strtoupper(($shipment_entry->notify_id >0 ? $shipment_entry->notify->name : ""))  }}</td></tr>
                                <tr><td width="20%"><strong>PHONE: </strong></td><td>{{($shipment_entry->notify_id >0 ? $shipment_entry->notify->phone: "")}}</td></tr>
                                <tr><td width="20%"><strong>EMAIL: </strong></td><td>{{strtoupper(($shipment_entry->notify_id >0 ? $shipment_entry->notify->email: "")) }}</td></tr>
                                <tr><td width="20%"><strong>FAX: </strong></td><td>{{($shipment_entry->notify_id >0 ? $shipment_entry->notify->fax: "")}}</td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">SHIPPER</div>
                        <div class="panel-body">
                            <p>{{ strtoupper(($shipment_entry->shipper_id >0 ? $shipment_entry->shipper->name : "")) }}</p>
                            <p>{{ strtoupper(($shipment_entry->shipper_id >0 ? $shipment_entry->shipper->address : "")) }}</p>
                            <p>{{ strtoupper(($shipment_entry->shipper_id >0 ? $shipment_entry->shipper->city : "")) }} {{ ($shipment_entry->shipper_state_id > 0) ? ', '.strtoupper($shipment_entry->shipper_state->name) : "" }}</p>
                            <p>Phone: {{ ($shipment_entry->shipper_id >0 ? $shipment_entry->shipper->phone : "") }} / Fax: {{ ($shipment_entry->shipper_id >0 ? $shipment_entry->shipper->fax : "") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <table class="table resume-table" >
                            <tr><td width="20%"><strong>VESSEL: </strong></td><td>{{ strtoupper($shipment_entry->vessel_name )}}</td></tr>
                            <tr><td width="20%"><strong>VOYAGE: </strong></td><td>{{ strtoupper($shipment_entry-> voyage_name) }}</td></tr>
                            <tr><td width="20%"><strong>ETD: </strong></td><td>{{ $shipment_entry->departure_date }}</td></tr>
                            <tr><td width="20%"><strong>CUT OFF: </strong></td><td>{{ $shipment_entry->cut_off_date }}</td></tr>
                            <tr><td width="20%"><strong>ETA: </strong></td><td>{{ $shipment_entry->arrival_date }}</td></tr>
                            <tr><td width="20%"><strong>CARRIER: </strong></td><td>{{ strtoupper(($shipment_entry->carrier_id >0 ? $shipment_entry->carrier->name : ""))}}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table" >
                <tr>
                    <td width="20%"><strong>PORT OF LOADING: </strong></td><td>{{ strtoupper(($shipment_entry->port_loading_id >0 ? $shipment_entry->port_loading->code ." - ".$shipment_entry->port_loading->name : "") )}}</td>
                    <td width="20%"><strong>PORT OF DISCHARGE: </strong></td><td>{{ strtoupper(($shipment_entry->port_unloading_id >0 ?  $shipment_entry->port_unloading->code ." - ".$shipment_entry->port_unloading->name : "")) }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>ORIGIN: </strong></td><td>{{ strtoupper(($shipment_entry->place_receipt_id >0 ? $shipment_entry->place_receipt->code ." - ".$shipment_entry->place_receipt->name : "")) }}</td>
                    <td width="20%"><strong>FINAL DESTINATION: </strong></td><td>{{ strtoupper(($shipment_entry->place_delivery_id >0 ? $shipment_entry->place_delivery->code ." - ".$shipment_entry->place_delivery->name : "")) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <th width="15%">TYPE</th>
                <th width="25%">EQUIPMENT NUMBER</th>
                <th width="15%">SEAL # 1</th>
                <th width="15%">SEAL # 2</th>
                <th width="30%">DRAYAGE BY</th>
                </thead>
                <tbody>
                @foreach($shipment_entry->container as $detail)
                    <tr>
                        <td>{{ ($detail->equipment_type_id >0 ? $detail->equipment_type->code : "") }}</td>
                        <td>{{ strtoupper($detail->container_number) }}</td>
                        <td>{{ $detail->container_seal_number }}</td>
                        <td>{{ $detail->container_seal_number2 }} </td>
                        <td>{{ strtoupper(($detail->carrier_id >0 ? $detail->carrier->name : "")) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <th width="15%"></th>
                <th width="10%">QUANTITY</th>
                <th width="10%">UNIT</th>
                <th width="15%">TOTAL WEIGHT</th>
                <th width="10%">TOTAL CUBIC</th>
                <th width="20%">CARGO TYPE</th>
                <th width="20%">COMMODITY</th>
                </thead>
                <tbody>

                <tr>
                    <td><strong>TOTALS: </strong></td>
                    <td>0</td>
                    <td>Kgs</td>
                    <td>0.00 Kgs</td>
                    <td>0.00 Kgs</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0.00 LBS</td>
                    <td>0.00 CFT</td>
                    <td></td>
                    <td></td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel-body">
                <p><strong>COMMENTS: </strong></p>
                <p> {{ $shipment_entry->shipment_comments }}</p>
            </div>
        </div>
    </div>
</div>
</body>

</html>