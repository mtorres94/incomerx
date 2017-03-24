<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $airway_bill->code }}</title>
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
            <div align="center" class="company-info" >
                <h5><strong>PRE-ALERT</strong></h5>
                <p class="code-bar">{{ $airway_bill->code }}</p>
                <p class="document_number">{{ $airway_bill->code }}</p>
                <br/>
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
                <p>Phone: 305-5992703 / Fax: 305-5992925</p>
                <p>www.vecologistics.com</p>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">SHIPPER</div>
                <div class="panel-body">
                    <p>{{ strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->name : "") }}</p>
                    <p>{{ strtoupper($airway_bill->shipper_address) }}</p>
                    <p>{{ strtoupper($airway_bill->shipper_city) }} {{ strtoupper($airway_bill->shipper_state_id > 0 ? ", ".$airway_bill->shipper_state->name : "") }}{{ $airway_bill->shipper_zip_code_id > 0 ? $airway_bill->shipper_zip_code->code : "" }}</p>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">CONSIGNEE</div>
                <div class="panel-body">
                    <p>{{ strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->name : "") }}</p>
                    <p>{{ strtoupper($airway_bill->consignee_address) }}</p>
                    <p>{{ strtoupper($airway_bill->consignee_city) }} {{ strtoupper($airway_bill->consignee_state_id > 0 ? ", ".$airway_bill->consignee_state->name : "") }}{{ $airway_bill->consignee_zip_code_id > 0 ? $airway_bill->consignee_zip_code->code : "" }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="tabla resume-table" align="center">
                <tr>
                    <td><strong>FILE NUMBER:</strong></td>
                    <td><p>{{ strtoupper($airway_bill->shipment_id > 0 ? $airway_bill->shipment->code : "") }}</p></td>
                </tr>
                <tr>
                    <td><strong>MAWB#:</strong></td>
                    <td><p>{{ strtoupper($airway_bill->booking_code) }}</p></td>
                </tr>
                <tr>
                    <td><strong>HAWB#:</strong></td>
                    <td><p>{{ strtoupper($airway_bill->code) }}</p></td>
                </tr>
                <tr>
                    <td><strong>CARRIER:</strong></td>
                    <td><p>{{ strtoupper($airway_bill->carrier_id >0 ? $airway_bill->carrier->name : "") }}</p></td>
                </tr>
                <tr>
                    <td><strong>FLIGHT:</strong></td>
                    <td><p>{{ $airway_bill->flight }}</p></td>
                </tr>
                <tr>
                    <td><strong>DEPARTURE:</strong></td>
                    <td><p>{{ $airway_bill->departure_date }}</p></td>
                </tr>
                <tr>
                    <td><strong>ARRIVAL:</strong></td>
                    <td><p>{{ $airway_bill->arrival_date }}</p></td>
                </tr>
                <tr>
                    <td><strong>ORIGIN:</strong></td>
                    <td><p>{{ strtoupper( $airway_bill->origin_id > 0 ? $airway_bill->origin->name : "") }}</p></td>
                </tr>
                <tr>
                    <td><strong>DESTINATION:</strong></td>
                    <td><p>{{ strtoupper( $airway_bill->destination_id > 0 ? $airway_bill->destination->name : "") }}</p></td>
                </tr>
                <tr>
                    <td><strong>PIECES:</strong></td>
                    <td><p>{{ strtoupper($airway_bill->sum_pieces) }}</p></td>
                </tr>
                <tr>
                    <td><strong>WEIGHT:</strong></td>
                    <td><p>{{ $airway_bill->sum_weight }} K</p></td>
                </tr>
                <tr>
                    <td><strong>CHARGEABLE WEIGHT:</strong></td>
                    <td><p>{{ $airway_bill->sum_charge_weight}} K</p></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>

</html>