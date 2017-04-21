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
            <div class="document-info pull-right">
                <h5><strong>DELIVERY ORDER</strong></h5>
                {!! DNS2D::getBarcodeSVG(
              $bill_of_lading->code
                , "QRCODE", 2, 2) !!}
                <p class="document_number">{{ $bill_of_lading->code }}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table">
                <tr>
                    <td colspan = "2" align="right" height="20px" width="50%"><strong>Delivery Carrier:</strong></td>
                    <td colspan = "2" width="50%" >{{ $bill_of_lading->carrier_id >0 ? strtoupper($bill_of_lading->carrier->name) : "" }}</td>
                </tr>
                <tr>
                    <td colspan = "2" align="right" height="20px"><strong>Phone:</strong></td>
                    <td colspan = "2" >{{ $bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->phone : "" }}</td>
                </tr>
                <tr>
                    <td colspan = "2" align="right" height="20px"><strong>Fax:</strong></td>
                    <td colspan = "2" >{{ $bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->fax : "" }}</td>
                </tr>
                <tr ><td height="20px"></td></tr>
                <tr>
                    <td align="right"><strong>Shipper</strong></td>
                    <td height="80px" style="border:1px solid;">
                        {{ $bill_of_lading->shipper_id > 0 ? strtoupper($bill_of_lading->shipper->name) : "" }}<br>
                        {{ strtoupper($bill_of_lading->shipper_address) }}<br>
                        {{ strtoupper($bill_of_lading->shipper_city) }}<br>
                        {{ $bill_of_lading->shipper_state_id > 0 ? strtoupper($bill_of_lading->shipper_state->name) : "" }}<br>
                        Phone: {{ $bill_of_lading->shipper_id > 0 ? strtoupper($bill_of_lading->shipper->phone) : "" }}<br>
                        Fax: {{ $bill_of_lading->shipper_id > 0 ? strtoupper($bill_of_lading->shipper->fax) : "" }}<br>
                    </td>
                    <td align="right"><strong>Consignee</strong></td>
                    <td height="80px" style="border:1px solid;">
                        {{ $bill_of_lading->consignee_id > 0 ? strtoupper($bill_of_lading->consignee->name) : "" }}<br>
                        {{ strtoupper($bill_of_lading->consignee_address) }}<br>
                        {{ strtoupper($bill_of_lading->consignee_city) }}<br>
                        {{ $bill_of_lading->consignee_state_id > 0 ? strtoupper($bill_of_lading->consignee_state->name) : "" }}<br>
                        Phone: {{ $bill_of_lading->consignee_id > 0 ? strtoupper($bill_of_lading->consignee->phone) : "" }}<br>
                        Fax: {{ $bill_of_lading->consignee_id > 0 ? strtoupper($bill_of_lading->consignee->fax) : "" }}<br>
                    </td>
                </tr>
                <tr><td height="10px"></td></tr>
                <tr>
                    <td align="right" height="20px"><strong>File Number:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->shipment_code) }}</td>
                    <td align="right"><strong>Customer Reference:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->customer_reference) }}</td>
                </tr>
                <tr>
                    <td align="right" height="20px"><strong>Mawb:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->mbl_code) }}</td>
                    <td align="right"><strong>Departure:</strong></td>
                    <td>{{ $bill_of_lading->departure_date }}</td>
                </tr>
                <tr>
                    <td align="right" height="20px"><strong>Hawb:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->code) }}</td>
                    <td align="right"><strong>Arrival:</strong></td>
                    <td>{{ $bill_of_lading->arrival_date }}</td>
                </tr>
                <tr ><td height="20px"></td></tr>
                <tr>
                    <td align="right" height="20px"><strong>Carrier:</strong></td>
                    <td>{{ $bill_of_lading->carrier_id >0 ? strtoupper($bill_of_lading->carrier->name) : "" }}</td>
                    <td align="right"><strong>Origin:</strong></td>
                    <td>{{ $bill_of_lading->port_loading_id >0 ? strtoupper($bill_of_lading->port_loading_name->name) : "" }}</td>
                </tr>
                <tr>
                    <td align="right" height="20px"><strong>Flight:</strong></td>
                    <td>{{ strtoupper($bill_of_lading->flight) }}</td>
                    <td align="right"><strong>Destination:</strong></td>
                    <td>{{ $bill_of_lading->port_unloading_id >0 ? strtoupper($bill_of_lading->port_unloading_name->name) : "" }}</td>
                </tr>
                <tr>
                    <td align="right" height="20px"><strong>Freight Location</strong></td>
                    <td height="80px">
                        <p>{{ strtoupper($bill_of_lading->location_id > 0 ? $bill_of_lading->location->name : "") }}<br>
                            {{ strtoupper($bill_of_lading->location_address) }}<br>
                            {{ strtoupper($bill_of_lading->location_city) }} {{ ($bill_of_lading->location_state_id > 0) ? ', '.strtoupper($bill_of_lading->location_state->name) : "" }} {{ ($bill_of_lading->location_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->location_zip_code->code) : ""  }}<br>
                            Phone: {{ $bill_of_lading->location_id > 0 ? $bill_of_lading->location->phone : "" }} <br>
                            Fax: {{ $bill_of_lading->location_id > 0 ? $bill_of_lading->location->fax  : ""}}</p>
                    </td>
                </tr>
                <tr>
                    <td align="right" height="20px"><strong>Pieces</strong></td>
                    <td>{{ round($bill_of_lading->total_pieces )}}</td>
                </tr>
                <tr>
                    <td align="right" height="20px"><strong>Weight</strong></td>
                    <td>
                        {{ $bill_of_lading->total_weight_unit == 'L'? $bill_of_lading->total_gross_weight : round($bill_of_lading->total_gross_weight * 0.453592, 3) }}&nbsp;Lbs<br>
                        {{ $bill_of_lading->total_weight_unit == 'L'? round($bill_of_lading->total_gross_weight * 0.453592, 3) : $bill_of_lading->total_gross_weight  }}&nbsp;Kgs<br>

                    </td>
                </tr>
                <tr><td height="20px"></td></tr>
                <tr>
                    <td colspan="4" height="20px"><strong>COMMENTS:</strong></td>
                </tr>
                <tr>
                    <td colspan="4">{{ strtoupper($bill_of_lading->bill_comments) }}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
</body>

</html>
