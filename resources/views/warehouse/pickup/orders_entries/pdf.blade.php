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
                <div class="pull-right">
                    <h5><strong>P/D Order</strong></h5>

                    <p>PD# {{ $order_entry->code }}</p>
                    <p>Schedule Delivery Date: {{ $order_entry->date_order }}</p>
                    <p>Order taken by: {{ Auth::user()->username }}</p>
                    <p>Carrier: {{ (($order_entry->carrier_id >0 )? $order_entry->carrier->name : "") }}</p>
                    <p>Driver: {{ (($order_entry->driver_id >0 )? $order_entry->driver->name : "") }}</p>
                    <p>License: {{ (($order_entry->driver_id >0 )? $order_entry->driver->driver_license : "") }}</p>
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
                <div class="col-xs-12">
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
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">THIRD PARTY</div>
                        <div class="panel-body">
                            <p>{{ strtoupper($order_entry->third_party->name) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">

            </div>
        </div>
    </div>
    <div class="row row-padding">
        <div class="col-xs-8">
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
        <div class="col-xs-4">
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
                <th>Qty</th>
                <th>Type</th>
                <th>Length</th>
                <th>Width</th>
                <th>Height</th>
                <th>Cubic</th>
                <th>Weight</th>
                <th>Unit</th>
                <th>Bin</th>
                <th>Reference</th>
                <th>Date Out</th>
                </thead>
                <tbody>
                @foreach($order_entry->cargo_details as $detail)
                    <tr>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->cargo_type->code }}</td>
                        <td>{{ $detail->length }}</td>
                        <td>{{ $detail->width }}</td>
                        <td>{{ $detail->height }}</td>
                        <td>{{ $detail->cubic }}</td>
                        <td>{{ $detail->total_weight }}</td>
                        <td>{{ ($detail->weight_unit_measurement_id == "L") ? "LBS" : "KGS" }}</td>
                        <td>{{ ($detail->location_bin_id > 0) ? $detail->bin->code : "" }}</td>
                        <td></td>
                        <td></td>
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