<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Entry {{ $order_entry->code }}</title>
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
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <table class="table resume-table" >
                            <tr><td width="20%"><strong>PD#: </strong></td><td>{{ $order_entry->code }}</td></tr>
                            <tr><td width="20%"><strong>Schedule Delivery Date: </strong></td><td>{{ $order_entry->date_order }}</td></tr>
                            <tr><td width="20%"><strong>Order taken by: </strong></td><td>{{ Auth::user()->username }}</td></tr>
                            <tr><td width="20%"><strong>Carrier: </strong></td><td>{{ (($order_entry->carrier_id >0 )? $order_entry->carrier->name : "") }}</td></tr>
                            <tr><td width="20%"><strong>Driver: </strong></td><td>{{ (($order_entry->driver_id >0 )? $order_entry->driver->name : "") }}</td></tr>
                            <tr><td width="20%"><strong>License: </strong></td><td>{{ (($order_entry->driver_id >0 )? $order_entry->driver->driver_license : "") }}</td></tr>
                            <tr><td width="20%"><strong>Dest: </strong></td><td>{{ (($order_entry->destination_world_location_id>0 )? $order_entry->destination_world_location_id->name : "") }}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row row-padding">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">SHIPPER</div>
                        <div class="panel-body">
                            <p>{{ strtoupper($order_entry->shipper->name) }}</p>
                            <p>{{ strtoupper($order_entry->shipper->address) }}</p>
                            <p>{{ strtoupper($order_entry->shipper->city) }} {{ ($order_entry->shipper_state_id > 0) ? ', '.strtoupper($order_entry->shipper->state->name) : "" }}</p>
                            <p>Phone: {{ $order_entry->shipper->phone }} / Fax: {{ $order_entry->shipper->fax }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">CONSIGNEE</div>
                <div class="panel-body">
                    <p>{{ strtoupper($order_entry->consignee->name) }}</p>
                    <p>{{ strtoupper($order_entry->consignee->address) }}</p>
                    <p>{{ strtoupper($order_entry->consignee->city) }} {{ ($order_entry->consignee_state_id > 0) ? ', '.strtoupper($order_entry->consignee->state->name) : "" }}</p>
                    <p>Phone: {{ $order_entry->consignee->phone }} / Fax: {{ $order_entry->consignee->fax }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-padding">
        <div class="col-xs-3">
            <div class="panel panel-default">
                <div class="panel-heading">Freight COD</div>
                <div class="panel-body">
                    <p>Freight Terms:  {{ strtoupper($order_entry->freight_terms) }}</p>
                    <p>Freight Amount:  {{ $order_entry->freight_amt }}</p>
                    <p>COD Terms:  {{ strtoupper($order_entry->cod_terms) }}</p>
                    <p>COD Amount:  {{ $order_entry->cod_terms_amt }}</p>
                    <p>Payment Term: {{ ($order_entry->payment_term_id > 0 ? $order_entry->payment_term->code : "")}}</p>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="panel panel-default">
                <div class="panel-heading">Emergency</div>
                <div class="panel-body">
                    <p>Emergency Contact:  {{ strtoupper($order_entry->hazardous_contact) }}</p>
                    <p>Emergency phone:  {{ $order_entry->hazardous_phone }}</p>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">THIRD PARTY</div>
                        <div class="panel-body">
                            <p>{{ strtoupper(($order_entry->third_party_id >0) ? $order_entry->third_party->name : "") }}</p>
                            <p>{{ strtoupper(($order_entry->third_party_id >0) ? $order_entry->third_party->address : "") }}</p>
                            <p>{{ strtoupper(($order_entry->third_party_id >0) ? $order_entry->third_party->phone : "") }}</p>
                            <p>{{ strtoupper(($order_entry->third_party_id >0) ? $order_entry->third_party->fax : "") }}</p>
                            <p>{{ strtoupper(($order_entry->third_party_id >0) ? $order_entry->third_party->coloader->name : "") }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="panel">
                <p>Service : {{ strtoupper(($order_entry->service_id > 0 )? $order_entry->service->name : "") }}</p>
            </div>
        </div>
        <div class="col-xs-3">
            <p>Declared value : {{ $order_entry->declared_value }}</p>
        </div>
        <div class="col-xs-3">
            <p>Insured value : {{ $order_entry->insured_value }}</p>
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">Special Instructions</div>
                <div class="panel-body">
                    <p> {{ $order_entry->reference_instruction }}</p>
                </div>
            </div>
        </div>



        <div class="col-xs-4">
            <table class="table table-condensed">
                <thead>
                <th width="33%">PO Number</th>
                <th width="33%">Inv #</th>
                </thead>
                <tbody>
                @foreach($order_entry->po_numbers as $detail)
                    <tr>
                        <td>{{ $detail->po_number }}</td>
                        <td>{{ $detail->ref_number }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-2">
            <table class="table table-condensed">
                <thead>
                <th>PRO Number(s)</th>
                </thead>
                <tbody>
                @foreach($order_entry->pro_numbers as $detail)
                    <tr>
                        <td>{{ $detail->pro_number }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row row padding">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                    <th>Pieces</th>
                    <th>Weight</th>
                    <th>Volume</th>
                    <th>Cargo Type</th>
                    <th>DIMS & Material Description</th>
                </thead>
                <tbody>
                @foreach($order_entry->cargo_details as $detail)
                    <tr>
                        <td>{{ $detail->cargo_pieces }}</td>
                        <td>{{ $detail->cargo_weight}}</td>
                        <td>{{ $detail->cargo_volume_weight }}</td>
                        <td>{{ $detail->cargo_type->code }}</td>
                        <td>{{ $detail->cargo_width }} x {{ $detail->cargo_height}} x {{ $detail->cargo_length }}  -  {{ $detail->cargo_material }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>

                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12 footer">

        </div>
    </div>

</div>
</body>

</html>