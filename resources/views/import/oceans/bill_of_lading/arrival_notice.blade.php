<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $bill_of_lading->code }}</title>
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
                    <h5><strong>ARRIVAL NOTICE</strong></h5>
                    {!! DNS2D::getBarcodeSVG(
                    $bill_of_lading->code
                    , "QRCODE", 2, 2) !!}
                    <p class="document_number">{{ $bill_of_lading->code }}</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table">
                <tr>
                    <td width="10%"><strong>Shipper:</strong></td>
                    <td width="40%" height="80px" style="border: 1px solid;">
                        <p>{{ strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->name : "") }}<br>
                            {{ strtoupper($bill_of_lading->shipper_address) }}<br>
                            {{ strtoupper($bill_of_lading->shipper_city) }} {{ ($bill_of_lading->shipper_state_id > 0) ? ', '.strtoupper($bill_of_lading->shipper_state->name) : "" }} {{ ($bill_of_lading->shipper_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->shipper_zip_code->code) : ""  }}<br>
                            Phone: {{ $bill_of_lading->shipper->phone }} / Fax: {{ $bill_of_lading->shipper->fax }}</p>
                    </td>
                    <td width="10%"><strong>Consignee:</strong></td>
                    <td width="40%" height="80px" style="border: 1px solid;">
                        <p>{{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "") }}<br>
                            {{ strtoupper($bill_of_lading->consignee_address) }}<br>
                            {{ strtoupper($bill_of_lading->consignee_city) }} {{ ($bill_of_lading->consignee_state_id > 0) ? ', '.strtoupper($bill_of_lading->consignee_state->name) : "" }} {{ ($bill_of_lading->consignee_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->consignee_zip_code->code) : ""  }}<br>
                            Phone: {{ $bill_of_lading->consignee->phone }} / Fax: {{ $bill_of_lading->consignee->fax }}</p>
                    </td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td height="20px"><strong>File Number:</strong></td>
                    <td>{{ $bill_of_lading->shipment_code }}</td>
                    <td><strong>Departure:</strong></td>
                    <td>{{ $bill_of_lading->departure_date }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>MBL:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->mbl_code) }}</td>
                    <td><strong>Arrival:</strong></td>
                    <td>{{ $bill_of_lading->arrival_date }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>HBL:</strong></td>
                    <td>{{ $bill_of_lading->code }}</td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td height="20px"><strong>Carrier:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->name : "" )}}</td>
                    <td><strong>Origin:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->port_loading_id > 0 ? $bill_of_lading->port_loading_name->name : "") }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>Vessel:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->vessel_name )}}</td>
                    <td><strong>Destination:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->port_unloading_id > 0 ? $bill_of_lading->port_unloading_name->name : "") }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>Voyage:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->voyage_name )}}</td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td height="20px"><strong>Pieces:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->total_pieces )}}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>Weight:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->total_gross_weight )}} &nbsp; {{ $bill_of_lading->total_weight_unit == 'L' ?  'Lbs' : 'Kgs' }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>Cubic:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->total_cubic )}} &nbsp; {{ $bill_of_lading->total_weight_unit == 'L' ?  'Cft' : 'Cbm' }}</td>
                </tr>
                <tr>
                    <td height="20px"><strong>COMMENTS:</strong></td>
                    <td colspan="3">{{ strtoupper($bill_of_lading->bill_comments )}}</td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <div class="row">

        <table class="resume-table" width="50%" align="center">
            <thead>
            <tr>
                <td width="70%"><strong>DESCRIPTION</strong></td>
                <td width="30%"><strong>AMOUNT ({{ $bill_of_lading->currency_id > 0 ? strtoupper($bill_of_lading->currency->code) : ""}})</strong></td>
            </tr>
            </thead>
            <tbody>
            <?php $total=0; ?>
            @foreach( $bill_of_lading->origin_charge as $detail)
                <tr>
                    <td height="20px">{{ $bill_of_lading->billing_id > 0 ? strtoupper($bill_of_lading->billing->code) : "" }}</td>
                    <td>{{ $bill_of_lading->billing_amount }}</td>
                    <?php $total+= $bill_of_lading->billing_amount ; ?>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td align="right"><strong>TOTAL ({{ $bill_of_lading->currency_id > 0 ? strtoupper($bill_of_lading->currency->code) : ""}})</strong></td>
                <td align="right">{{ $total }}</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="row">
        <table class="table resume-table" >
            <tr>
                <td height="20px"><strong>COMMENTS:</strong></td>
                <td colspan="3">{{ strtoupper($bill_of_lading->bill_comments) }}</td>
            </tr>
        </table>
    </div>



</div>
</body>

</html>
