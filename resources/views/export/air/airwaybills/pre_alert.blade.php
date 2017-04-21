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
                {!! DNS2D::getBarcodeSVG(
                $airway_bill->code
                , "QRCODE", 2, 2) !!}
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
    <div class="row" align="center">
        <table class="resume-table" width="50%">
            <tr>
                <td width="20%" align="right"><strong>Shipper</strong></td>
                <td width="80%" style="border:1px solid;" height="80px">
                    <p>{{ strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->name : "") }}<br>
                    {{ strtoupper($airway_bill->shipper_address) }}<br>
                    {{ strtoupper($airway_bill->shipper_city) }} {{ strtoupper($airway_bill->shipper_state_id > 0 ? ", ".$airway_bill->shipper_state->name : "") }}{{ $airway_bill->shipper_zip_code_id > 0 ? $airway_bill->shipper_zip_code->code : "" }}</p>
                </td>
            </tr>
            <tr><td height="20px"></td></tr>
            <tr>
                <td width="20%" align="right"><strong>Consignee</strong></td>
                <td width="80%" style="border:1px solid;" height="80px">
                    <p>{{ strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->name : "") }}<br>
                    {{ strtoupper($airway_bill->consignee_address) }}<br>
                    {{ strtoupper($airway_bill->consignee_city) }} {{ strtoupper($airway_bill->consignee_state_id > 0 ? ", ".$airway_bill->consignee_state->name : "") }}{{ $airway_bill->consignee_zip_code_id > 0 ? $airway_bill->consignee_zip_code->code : "" }}</p>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="row" align="center">
        <div class="col-xs-12">
            <table class="resume-table" >
                <tr>
                    <td height="20px"><strong>FILE NUMBER:</strong></td>
                    <td>{{ strtoupper($airway_bill->shipment_id > 0 ? $airway_bill->shipment->code : "") }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>MAWB#:</strong></td>
                    <td>{{ strtoupper($airway_bill->booking_code) }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>HAWB#:</strong></td>
                    <td>{{ strtoupper($airway_bill->code) }}</td>
                </tr>
                <tr><td height="20px"></td></tr>
                <tr>
                    <td height="20px"><strong>CARRIER:</strong></td>
                    <td>{{ strtoupper($airway_bill->carrier_id >0 ? $airway_bill->carrier->name : "") }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>FLIGHT:</strong></td>
                    <td>{{ $airway_bill->flight }}</td>
                </tr>
                <tr><td height="20px"></td></tr>
                <tr>
                    <td height="20px"><strong>DEPARTURE:</strong></td>
                    <td>{{ $airway_bill->departure_date }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>ARRIVAL:</strong></td>
                    <td>{{ $airway_bill->arrival_date }}</td>
                </tr>
                <tr><td height="20px"></td></tr>
                <tr>
                    <td height="20px"><strong>ORIGIN:</strong></td>
                    <td>{{ strtoupper( $airway_bill->origin_id > 0 ? $airway_bill->origin->name : "") }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>DESTINATION:</strong></td>
                    <td>{{ strtoupper( $airway_bill->destination_id > 0 ? $airway_bill->destination->name : "") }}</td>
                </tr>
                <tr><td height="20px"></td></tr>
                <tr>
                    <td height="20px"><strong>PIECES:</strong></td>
                    <td>{{ strtoupper($airway_bill->total_pieces) }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>WEIGHT:</strong></td>
                    <td>{{ $airway_bill->total_weight_unit =='K' ? $airway_bill->total_gross_weight : round($airway_bill->total_gross_weight * 0.453592, 3) }} Kgs </td>
                </tr>
                <tr>
                    <td height="20px"><strong>CHARGEABLE WEIGHT:</strong></td>
                    <td>{{ $airway_bill->total_weight_unit =='K' ? $airway_bill->total_charge_weight : round($airway_bill->total_charge_weight * 0.453592, 3) }} Kgs </td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="row resume-table">
        <div class="col-xs-12">
            <p>COMMENTS:</p>
            <p>{{ $airway_bill->airwaybill_comments }}</p>
        </div>
    </div>
</div>
</body>

</html>