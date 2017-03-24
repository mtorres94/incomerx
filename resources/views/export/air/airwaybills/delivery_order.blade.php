<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ strtoupper($airway_bill->booking_code) }}</title>
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
                    <h5><strong>DELIVERY ORDER</strong></h5>
                    <p class="document_number"><strong>MAWB#  {{ strtoupper($airway_bill->booking_code) }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">DELIVERY CARRIER</div>
                        <div class="panel-body">
                            <table class="table resume-table">
                                <tr>
                                    <td width="20%">
                                        <p> {{ strtoupper($airway_bill->carrier_id > 0 ? $airway_bill->carrier->name : "") }}</p>
                                    </td>
                                </tr>
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
                        <div class="panel-heading">CONSIGNEE</div>
                        <div class="panel-body">
                            <table class="table resume-table">
                                <tr><td>{{ strtoupper($airway_bill->consignee_id >0 ? $airway_bill->consignee->name : "")  }}</td>
                                <tr><td>{{ strtoupper($airway_bill->consignee_id >0 ? $airway_bill->consignee->address : "")  }}</td>
                                <tr><td>{{ strtoupper($airway_bill->consignee_id >0 ? $airway_bill->consignee->city : "")  }}</td>
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
                            <p>{{ strtoupper(($airway_bill->shipper_id >0 ? $airway_bill->shipper->name : "")) }}</p>
                            <p>{{ strtoupper(($airway_bill->shipper_id >0 ? $airway_bill->shipper->address : "")) }}</p>
                            <p>{{ strtoupper(($airway_bill->shipper_id >0 ? $airway_bill->shipper->city : "")) }} </p>
                            <p>{{ ($airway_bill->shipper_state_id > 0) ? strtoupper($airway_bill->shipper_state->name) : "" }} {{ ($airway_bill->shipper_zip_code_id > 0) ? $airway_bill->shipper_zip_code->code : "" }}</p>
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
                            <tr><td width="20%"><strong>FILE: </strong></td><td>{{ strtoupper($airway_bill->shipment_id > 0 ? $airway_bill->shipment->code : "")}}</td></tr>
                            <tr><td width="25%"><strong>MAWB#: </strong></td><td>{{ strtoupper($airway_bill->booking_code) }}</td></tr>
                            <tr><td width="20%"><strong>HAWB#: </strong></td><td>{{ strtoupper($airway_bill->code )}}</td></tr>
                            <tr><td width="20%"><strong>FLIGHT: </strong></td><td>{{ strtoupper($airway_bill->flight )}}</td></tr>
                            <tr>
                                <td width="20%"><strong>ORIGIN: </strong></td>
                                <td>{{ strtoupper(($airway_bill->origin_id >0 ? $airway_bill->origin->code : ""))}}</td>
                                <td width="20%"><strong>DEST: </strong></td>
                                <td>{{ strtoupper(($airway_bill->destination_id >0 ? $airway_bill->destination->code: ""))}}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <table class="table header-table">
        <thead>
        <tr>
            <th width="30%"><strong>NATURE OF GOODS</strong></th>
            <th width="5%"><strong>PIECES</strong></th>
            <th width="20%"><strong>COMMODITY</strong></th>
            <th width="10%"><strong>ACT. WEIGHT</strong></th>
            <th width="10%"><strong>CHRG. WEIGHT</strong></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $airway_bill->cargo_notes }}</td>
                <td>{{ $airway_bill->sum_pieces}}</td>
                <td>{{ $airway_bill->total_commodity}}</td>
                <td>{{ $airway_bill->sum_weight }}</td>
                <td>{{ $airway_bill->sum_charge_weight }}</td>
            </tr>
            <tr>
                <td>{{ $airway_bill->airwaybill_comments }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td><strong>TOTAL:</strong></td>
                <td colspan="2">{{ $airway_bill->sum_pieces }}</td>
                <td >{{ $airway_bill->sum_weight}}</td>
                <td>{{ $airway_bill->sum_charge_weight}}</td>
            </tr>
        </tfoot>
    </table>
    <div class="row">
        @if($type != 4)
        <div class="col-xs-8">
            <table class="table header-table">
                <tr>
                    <td>Airline Agent Note: </td>
                    <td colspan="3" align="left"><strong>Delivering{{ $type == 1?  '  Documents and Freight' : ($type == '2' ? '  Documents Only' : '  Freight Only')}} </strong></td>
                </tr>
                <tr>
                    <td colspan="4">The Goods here in Described are Accepted Apparently in Good Order and Condition</td>
                </tr>
                <tr>
                    <td width="20%"><strong>Received By: </strong></td>
                    <td width="30%" style="border-bottom: black 1px solid"></td>
                    <td width="20%"><strong>Date: </strong></td>
                    <td width="30%" style="border-bottom: black 1px solid"></td>
                </tr>
            </table>
        </div>
        @else
            <div class="col-xs-12">
                <table class="table header-table">
                    <tr>
                        <td>Carrier Driver Instructions: </td>
                    </tr>

                    <tr>
                        <td width="15%"><strong>Received By: </strong></td>
                        <td width="25%" style="border-bottom: black 1px solid"></td>
                        <td width="10%"><strong>Date: </strong></td>
                        <td width="15%" style="border-bottom: black 1px solid"></td>
                        <td width="10%"><strong>Signature: </strong></td>
                        <td width="20%" style="border-bottom: black 1px solid"></td>
                    </tr>
                </table>
        @endif
    </div>


</div>
</body>

</html>