<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $quote->code }}</title>
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
                    <h5><strong>QUOTE</strong></h5>
                    <p class="code-bar">{{ $quote->code }}</p>
                    <p class="document_number">{{ $quote->code }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">EFFECTIVE DATE</div>
                        <div class="panel-body">
                            <p>{{ strtoupper($quote->date_today) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">EXPIRATION DATE</div>
                        <div class="panel-body">
                            <p>{{ strtoupper($quote->valid_date) }}</p>
                        </div>
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
                        <div class="panel-heading">CUSTOMER</div>
                        <div class="panel-body">
                            <p>{{ strtoupper($quote->customer->name) }}</p>
                            <p>{{ strtoupper($quote->customer->address) }}</p>
                            <p>{{ strtoupper($quote->customer->city) }} {{ ($quote->customer_state_id > 0) ? ', '.strtoupper($quote->customer->state->name) : "" }}</p>
                            <p>Phone: {{ $quote->customer->phone }} / Fax: {{ $quote->customer->fax }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">SHIPPER</div>
                        <div class="panel-body">
                            <p>{{ strtoupper($quote->shipper->name) }}</p>
                            <p>{{ strtoupper($quote->shipper->address) }}</p>
                            <p>{{ strtoupper($quote->shipper->city) }} {{ ($quote->shipper_state_id > 0) ? ', '.strtoupper($quote->shipper->state->name) : "" }}</p>
                            <p>Phone: {{ $quote->shipper->phone }} / Fax: {{ $quote->shipper->fax }}</p>
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
                            <div class="panel-heading">ADDITIONAL INFORMATION</div>
                            <div class="panel-body">
                                <p><strong>ORIGIN: </strong>{{ ($quote->port_loading_id ? strtoupper($quote->port_loading->name) : "") }}</p>
                                <p><strong>DESTINATION: </strong> {{ ($quote->port_unloading_id > 0 ? strtoupper($quote->port_unloading->name) : "") }}</p>
                                <p><strong>SERVICE:</strong> {{ $quote->service_id > 0 ?  strtoupper($quote->service->name) : ""}} </p>
                                <p><strong>COMMODITY: </strong>{{ ($quote->total_commodity_id > 0 ? $quote->total_commodity->name : "") }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">CONSIGNEE</div>
                            <div class="panel-body">
                                <p>{{ strtoupper($quote->consignee->name) }}</p>
                                <p>{{ strtoupper($quote->consignee->address) }}</p>
                                <p>{{ strtoupper($quote->consignee->city) }} {{ ($quote->consignee_state_id > 0) ? ', '.strtoupper($quote->consignee->state->name) : "" }}</p>
                                <p>Phone: {{ $quote->consignee->phone }} / Fax: {{ $quote->consignee->fax }}</p>
                            </div>
                        </div>
                    </div>
                </div>
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

                    </thead>
                    <tbody>
                    @foreach($quote->cargo as $detail)
                        <tr>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->cargo_type->code }}</td>
                            <td>{{ $detail->length }}</td>
                            <td>{{ $detail->width }}</td>
                            <td>{{ $detail->height }}</td>
                            <td>{{ $detail->total_cubic }}</td>
                            <td>{{ $detail->total_weight }}</td>
                            <td>{{ ($detail->weight_unit_measurement_id == "L") ? "LBS" : "KGS" }}</td>
                            <td>{{ ($detail->location_id > 0) ? $detail->location->code . $detail->location_bin_id : "" }}</td>

                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"><strong>TOTAL PIECES:</strong> {{ $quote->total_quantity}}</td>
                        <td colspan="2" style="text-align: right"><strong>WEIGHT:</strong></td>
                        <td>{{ $quote->total_weight }} Lbs</td>
                        <td colspan="3" style="text-align: right;"><strong>CUBIC:</strong></td>
                        <td>{{ $quote->total_cubic }} Cft</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td>{{ round($quote->total_weight * 0.453592, 3) }} Kgs</td>
                        <td colspan="3"></td>
                        <td>{{ round($quote->total_cubic * 0.02831685, 3) }} Cbm</td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <p class="document_number"><strong>Origin Charges</strong></p>
            </div>
        </div>
        <div class="row row padding">
            <div class="col-xs-12">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th  width="15%">Code</th>
                        <th  width="45%">Description</th>
                        <th  width="10%">Qty</th>
                        <th  width="10%">Unit</th>
                        <th  width="10%">Rate</th>
                        <th  width="10%">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quote->origin_charge as $detail)
                        <tr>
                            <td>{{ strtoupper($detail->billing_id > 0 ? $detail->billing->code : "")}}</td>
                            <td>{{ strtoupper($detail->billing_id > 0 ? $detail->billing->name : "")}}</td>
                            <td>{{ $detail->billing_quantity }}</td>
                            <td>{{ strtoupper($detail->billing_unit_id >0 ? $detail->billing_unit->code : "") }}</td>
                            <td>{{ $detail->billing_rate }}</td>
                            <td>{{ $detail->billing_amount }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align: right"><strong>TOT. AMOUNT</strong></td>
                        <td><strong>{{ $quote->sum_bill }} </strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <p class="document_number"><strong>DESTINATION  CHARGES</strong></p>
            </div>
        </div>
        <div class="row row padding">
            <div class="col-xs-12">
                <table class="table table-condensed">
                    <thead>
                    <th  width="15%">Code</th>
                    <th  width="45%">Description</th>
                    <th  width="10%">Qty</th>
                    <th  width="10%">Unit</th>
                    <th  width="10%">Rate</th>
                    <th  width="10%">Amount</th>
                    </thead>
                    <tbody>
                    @foreach($quote->destination_charge as $detail)
                        <tr>
                            <td>{{ strtoupper($detail->billing_id > 0 ? $detail->billing->code : "")}}</td>
                            <td>{{ strtoupper($detail->billing_id > 0 ? $detail->billing->name : "")}}</td>
                            <td>{{ $detail->billing_quantity }}</td>
                            <td>{{ strtoupper($detail->billing_unit_id >0 ? $detail->billing_unit->code : "") }}</td>
                            <td>{{ $detail->billing_rate }}</td>
                            <td>{{ $detail->billing_amount }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align: right"><strong>TOT. AMOUNT</strong></td>
                        <td><strong>{{ $quote->dest_sum_bill }} </strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row row-padding">
            <div class="col-xs-12 footer">
                <p><strong>COMMENTS:</strong> {{ $quote->quotes_comments }}</p>
                <p><strong>INSTRUCTIONS:</strong> {{ $quote->quote_instruction }}</p>
            </div>
        </div>
    </div>
</div>
</body>

</html>
