<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $booking_entry->code }}</title>
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

    <style type="text/css">
        .page {
            overflow: hidden;
            page-break-after: always;
        }
    </style>
</head>

<body>
<div class="page">
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
                {!! DNS2D::getBarcodeSVG(
                    ($booking_entry->shipment_id >0 ? $booking_entry->shipment->code : "")
                  , "QRCODE", 2, 2) !!}
                <h5><strong>AIR CARGO MANIFEST</strong></h5>
                <p style="font-size: 12px;"> FILE/ MANIFEST: {{  $booking_entry->shipment_id >0 ? $booking_entry->shipment->code : "" }}</p>
                <p style="font-size: 12px;">MASTER AWB: {{  $booking_entry->code }}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table">
            <tr>
                <td width="50%" style="border: 1px solid;">
                    <p><strong>AGENT: </strong>{{ strtoupper($booking_entry->agent_id >0 ? $booking_entry->agent->code : "") }}</p>
                    <p>{{ strtoupper($booking_entry->agent_id >0 ? $booking_entry->agent->name : "") }}</p>
                    <p>{{ strtoupper($booking_entry->agent_id >0 ? $booking_entry->agent->address : "") }}</p>
                    <p><strong>Contact:</strong>{{ strtoupper($booking_entry->agent_contact) }} </p>
                    <p><strong>Phone: </strong> {{ $booking_entry->agent_phone }}</p>
                    <p><strong>Fax: </strong>{{ $booking_entry->agent_fax }}</p>
                </td>
                <td width="50%" style="border: 1px solid;">
                    <p><strong>AIRLINE: </strong>{{ strtoupper($booking_entry->carrier_id >0 ? $booking_entry->carrier->name : "") }}</p>
                    <p><strong>DEPARTURE DATE: </strong>{{ $booking_entry->departure_date}}</p>
                    <p><strong>FLIGHT: </strong>{{ $booking_entry->first_flight }} </p>
                    <p><strong>E.T.A: </strong> {{ $booking_entry->arrival_date}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="border: 1px solid;">
                    <p><strong>AIRPORT OF DEPARTURE: </strong>{{ strtoupper($booking_entry->origin_id >0 ? $booking_entry->origin->code : "")  }}</p>
                    <p><strong>AIRPORT OF DESTINATION: </strong>{{strtoupper($booking_entry->destination_id >0 ? $booking_entry->destination->code : "") }}</p>
                </td>
            </tr>
        </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td width="10%">AIRWAY BILL NO</td>
                    <td width="10%">NO OF PIECES</td>
                    <td width="10%"> WEIGHT (Lb)</td>
                    <td width="10%"> WEIGHT (Kg)</td>
                    <td width="30%">NATURE OF GOODS</td>
                    <td width="30%">COMMENTS</td>
                </tr>
                </thead>
                <tbody>
                <?php $pieces=0; $weight=0;  ?>
                @foreach($booking_entry->airwaybill as $airway_bill)
                    @if($airway_bill->awb_class != 3)
                        <tr>
                            <td><p>{{ $airway_bill->code }}</p>
                                {!! DNS2D::getBarcodeSVG(
                                  $airway_bill->code
                                 , "QRCODE", 2, 2) !!}
                            <td>{{ $airway_bill->total_pieces }}</td>
                            <td>{{ $airway_bill->total_unit_weight == 'L' ? $airway_bill->total_gross_weight : round($airway_bill->total_gross_weight * 0.453592, 3)}} &nbsp; Lbs</td>
                            <td>{{ $airway_bill->total_unit_weight == 'K' ? $airway_bill->total_gross_weight : round($airway_bill->total_gross_weight * 2.2, 3)}} Kgs</td>
                            <td>{{ strtoupper($airway_bill->cargo_notes) }}</td>
                            <td>{{ strtoupper($airway_bill->airwaybill_comments) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Shipper:    </strong>{{ strtoupper($airway_bill->shipper_id >0 ? $airway_bill->shipper->name : "") }}</td>
                            <td><strong>Consignee: </strong></td>
                            <td colspan="2">{{ strtoupper($airway_bill->consignee_id >0 ? $airway_bill->consignee->name : "") }}</td>
                        </tr>

                        <?php $pieces+= $airway_bill->total_pieces; ?>
                        <?php $weight+= $airway_bill->total_gross_weight; ?>
                    @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td align="right"><strong>PIECES: </strong></td>
                    <td>{{ $pieces }}</td>
                    <td align="right"><strong>WEIGHT: </strong></td>
                    <td>{{ $weight }}</td>
                    <td></td>
                </tr>
                </tfoot>

            </table>
        </div>
    </div>



</div>
</body>

</html>