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
                <h5><strong>ARRIVAL NOTICE / FREIGHT INVOICE</strong></h5>
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
                <td width="15%" align="right"><strong>Shipper</strong></td>
                <td width="35%" style="border:1px solid;" height="70px">
                    <p>{{ strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->name : "") }}<br>
                        {{ strtoupper($bill_of_lading->shipper_address) }}<br>
                        {{ strtoupper($bill_of_lading->shipper_city) }} {{ ($bill_of_lading->shipper_state_id > 0) ? ', '.strtoupper($bill_of_lading->shipper_state->name) : "" }} {{ ($bill_of_lading->shipper_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->shipper_zip_code->code) : ""  }}<br>
                        Phone: {{ $bill_of_lading->shipper->phone }} / Fax: {{ $bill_of_lading->shipper->fax }}</p>
                </td>
                <td width="15%" align="right"><strong>Consignee</strong></td>
                <td width="35%" style="border:1px solid;" height="70px">
                    <p>{{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "") }}<br>
                        {{ strtoupper($bill_of_lading->consignee_address) }}<br>
                        {{ strtoupper($bill_of_lading->consignee_city) }} {{ ($bill_of_lading->consignee_state_id > 0) ? ', '.strtoupper($bill_of_lading->consignee_state->name) : "" }} {{ ($bill_of_lading->consignee_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->consignee_zip_code->code) : ""  }}<br>
                        Phone: {{ $bill_of_lading->consignee->phone }} / Fax: {{ $bill_of_lading->consignee->fax }}</p>
                </td>
            </tr>
            <tr><td height="10px"></td></tr>
            <tr>
                <td align="right"><strong>Broker:</strong></td>
                <td style="border:1px solid;" height="70px">
                    <p>{{ strtoupper($bill_of_lading->broker_code > 0 ? $bill_of_lading->broker->name : "") }}<br>
                        Phone: {{ $bill_of_lading->broker_phone }}
                        <br> Fax: {{ $bill_of_lading->broker_code > 0 ? $bill_of_lading->broker->fax  : ""}}</p>
                </td>
                <td align="right"><strong>Notify:</strong></td>
                <td style="border:1px solid;" height="70px">
                    <p>{{ strtoupper($bill_of_lading->notify_id > 0 ? $bill_of_lading->notify->name : "") }}<br>
                        {{ strtoupper($bill_of_lading->notify_address) }}<br>
                        {{ strtoupper($bill_of_lading->notify_city) }} {{ ($bill_of_lading->notify_state_id > 0) ? ', '.strtoupper($bill_of_lading->notify_state->name) : "" }} {{ ($bill_of_lading->notify_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->notify_zip_code->code) : ""  }}<br>
                        Phone: {{ $bill_of_lading->notify_id > 0 ? $bill_of_lading->notify->phone : "" }} <br>
                        Fax: {{ $bill_of_lading->notify_id > 0 ? $bill_of_lading->notify->fax  : ""}}</p>
                </td>
            </tr>
            <tr><td height="10px"></td></tr>
            <tr>
                <td align="right" height="15px"><strong>File Number:</strong></td>
                <td>{{ strtoupper($bill_of_lading->shipment_code) }}</td>
                <td align="right" ><strong>Customer Reference:</strong></td>
                <td>{{ strtoupper($bill_of_lading->customer_reference) }}</td>
            </tr>
            <tr>
                <td align="right" height="15px"><strong>Mawb:</strong></td>
                <td>{{ strtoupper($bill_of_lading->mbl_code) }}</td>
                <td align="right"><strong>Departure:</strong></td>
                <td>{{ $bill_of_lading->departure_date }}</td>
            </tr>
            <tr>
                <td align="right" height="15px"><strong>Hawb:</strong></td>
                <td>{{ strtoupper($bill_of_lading->code) }}</td>
                <td align="right"><strong>Arrival:</strong></td>
                <td>{{ $bill_of_lading->arrival_date }}</td>
            </tr>
            <tr>
                <td align="right" height="15px"><strong>Carrier:</strong></td>
                <td>{{ $bill_of_lading->carrier_id >0 ? strtoupper($bill_of_lading->carrier->name) : "" }}</td>
                <td align="right"><strong>Origin:</strong></td>
                <td>{{ $bill_of_lading->port_loading_id >0 ? strtoupper($bill_of_lading->port_loading_name->name) : "" }}</td>
            </tr>
            <tr>
                <td align="right" height="15px"><strong>Flight:</strong></td>
                <td>{{ strtoupper($bill_of_lading->flight) }}</td>
                <td align="right"><strong>Destination:</strong></td>
                <td>{{ $bill_of_lading->port_unloading_id >0 ? strtoupper($bill_of_lading->port_unloading_name->name) : "" }}</td>
            </tr>
            <tr>
                <td align="right" ><strong>Freight Location</strong></td>
                <td height="70px">
                    <p>{{ strtoupper($bill_of_lading->location_id > 0 ? $bill_of_lading->location->name : "") }}<br>
                        {{ strtoupper($bill_of_lading->location_address) }}<br>
                        {{ strtoupper($bill_of_lading->location_city) }} {{ ($bill_of_lading->location_state_id > 0) ? ', '.strtoupper($bill_of_lading->location_state->name) : "" }} {{ ($bill_of_lading->location_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->location_zip_code->code) : ""  }}<br>
                        Phone: {{ $bill_of_lading->location_id > 0 ? $bill_of_lading->location->phone : "" }} <br>
                        Fax: {{ $bill_of_lading->location_id > 0 ? $bill_of_lading->location->fax  : ""}}</p>
                </td>
            </tr>
            <tr>
                <td align="right" height="15px"><strong>Pieces</strong></td>
                <td>{{ round($bill_of_lading->total_pieces) }}</td>
            </tr>
            <tr>
                <td align="right" height="15px"><strong>Weight</strong></td>
                <td>
                    {{ $bill_of_lading->total_weight_unit == 'L' ? $bill_of_lading->total_gross_weight : round($bill_of_lading->total_gross_weight * 0.453592,3) }} &nbsp;Lbs<br>
                    {{ $bill_of_lading->total_weight_unit == 'L'? round($bill_of_lading->total_gross_weight * 0.453592, 3) : $bill_of_lading->total_gross_weight }} &nbsp;Kgs
                </td>
            </tr>
            <tr><td height="20px"></td></tr>
        </table>
        </div>
    </div>
    <br>
    <p class="company-info" align="center"><strong>CHARGES</strong></p>
    <div class="row">
        <table class="resume-table" align="center" width="60%">
            <thead>
            <tr>
                <th width="70%" style="border:1px solid;" align="center"><strong>DESCRIPTION</strong></th>
                <th width="30%" style="border:1px solid;" align="center"><strong>AMOUNT ({{ $bill_of_lading->currency_type > 0 ? strtoupper($bill_of_lading->currency->code ): "" }})</strong></th>
            </tr>
            </thead>
            <tbody>
            <?php $sum_amount =0; ?>
            @foreach($bill_of_lading->origin_charge as $detail)
                <tr>
                    <td height="15px" align="right">{{ $detail->billing_id > 0 ? strtoupper($detail->billing->name) : "" }}</td>
                    <td>{{ $detail->billing_amount }}</td>
                </tr>
                <?php $sum_amount+= $detail->billing_amount ; ?>
            @endforeach
            <tr><td height="20px"></td></tr>
            </tbody>
            <tfoot>
            <tr>
                <td style="border:1px solid;" align="right">TOTALS({{ $bill_of_lading->currency_type > 0 ? strtoupper($bill_of_lading->currency->code ): "" }})</td>
                <td style="border:1px solid;"  align="right">{{ $sum_amount }}</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
            <tr>
                <td WIDTH="10%"><strong>COMMODITY</strong></td>
                <td>{{ strtoupper($bill_of_lading->total_commodity_name) }}</td>
            </tr>
            <tr>
                <td><strong>COMMENTS</strong></td>
                <td>{{ $bill_of_lading->bill_comments }}</td>
            </tr>
        </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
            <tr>
                <td>
                    *VECO LOGISTICS MIAMI has a policy against payment, solicitation, or receipt of any rebate, directly or indirectly, wich would be unlawfull under the United States shipping Act of 1984.<br>
                    *Upon request, we shall provide detailed breakout of the components of all charges assessed and a true copy of each pertinent relating to these charges.<br>
                    *For the purpose of fixing the maximum limit of the trucker's liability for loose or damage to merchandise shall be conclusively presumed to be not in excess of 12 1/2 cents per pound (including government duties and excise taxes), unless a greater value should be declared as herein after provided. Refer to our Tariff for details.
                </td>
            </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
            <tr>
                <td align="center"><p>*** MAKE ALL CHECKS PAYABLE TO VECO LOGISTICS MIAMI ***</p></td>
            </tr>
        </table>
        </div>
    </div>
</div>
</body>

</html>
