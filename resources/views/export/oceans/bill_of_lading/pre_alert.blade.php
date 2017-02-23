<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bill of Lading {{ $bill_of_lading->code }}</title>
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
        <div class="col-xs-12">
            <div align="center" class="company-info" width="75%">
                <h5><strong>PRE-ALERT</strong></h5>
                <p  class="code-bar">{{ $bill_of_lading->code }}</p>
                <p class="document_number">{{ $bill_of_lading->code }}</p>
                <br/>
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
                <p>Phone: 305-5992703 / Fax: 305-5992925</p>
                <p>www.vecologistics.com</p>
                <br/>
                <p>Printed on: {{ \Carbon\Carbon::now()->toDateString() }}</p>
                <p>Printed by: {{ Auth::user()->username }}</p>
                <hr/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <table class="tabla resume-table" align="center">
                    <tr>
                        <td width="20%"><strong>SHIPPER:</strong></td>
                        <td>
                            <p>{{ strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->name : "") }}</p>
                            <p>{{ strtoupper($bill_of_lading->shipper_address) }}</p>
                            <p>{{ strtoupper($bill_of_lading->shipper_city) }} {{ strtoupper($bill_of_lading->shipper_state_id > 0 ? ", ".$bill_of_lading->shipper_state->name : "") }}{{ $bill_of_lading->shipper_zip_code_id > 0 ? $bill_of_lading->shipper_zip_code->code : "" }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td width="20%"><strong>CONSIGNEE:</strong></td>
                        <td>
                            <p>{{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "") }}</p>
                            <p>{{ strtoupper($bill_of_lading->consignee_address) }}</p>
                            <p>{{ strtoupper($bill_of_lading->consignee_city) }} {{ strtoupper($bill_of_lading->consignee_state_id > 0 ? ", ".$bill_of_lading->consignee_state->name : "") }}{{ $bill_of_lading->consignee_zip_code_id > 0 ? $bill_of_lading->consignee_zip_code->code : "" }}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <table class="tabla resume-table" align="center">
                    <tr>
                        <td ><strong>File#:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->shipment_id > 0 ? $bill_of_lading->shipment->code : "") }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>MBL#:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->mbl_code) }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>HBL#:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->code) }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>CARRIER#:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->name : "") }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>VESSEL:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->vessel_name) }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>VOYAGE:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->voyage_name) }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>DEPARTURE:</strong></td>
                        <td><p>{{ $bill_of_lading->departure_date }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>ARRIVAL:</strong></td>
                        <td><p>{{ $bill_of_lading->arrival_date }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>ORIGIN:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->port_loading_id >0 ? $bill_of_lading->loading->name : "") }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>DESTINATION:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->port_unloading_id >0 ? $bill_of_lading->unloading->name : "") }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>PIECES:</strong></td>
                        <td><p>{{ strtoupper($bill_of_lading->total_pieces) }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>WEIGHT:</strong></td>
                        <td><p>{{ $bill_of_lading->total_weight_kgs }} K</p></td>
                    </tr>
                    <tr>
                        <td><strong>CUBIC:</strong></td>
                        <td><p>{{ $bill_of_lading->total_cubic_cbm }} K</p></td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</body>

</html>