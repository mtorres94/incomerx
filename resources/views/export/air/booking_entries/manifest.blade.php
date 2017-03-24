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
                <h5><strong>AIR CARGO MANIFEST</strong></h5>
                <p class="code-bar">{{ $type== 1 ? "": ( $booking_entry->shipment_id >0 ? $booking_entry->shipment->code : "") }}</p>
                <p class="document_number">FILE#: {{ $booking_entry->shipment_id >0 ? $booking_entry->shipment->code : "" }}<br>
                    MAWB: {{ $booking_entry->code}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="30%">2. OWNER / OPERATOR<br>{{ strtoupper($booking_entry->shipper_id >0 ? $booking_entry->shipper->name : "") }}</td>
                <td width="40%">3. MARKS OF NATIONALITY AND REGISTRATION <br> USA</td>
                <td width="30%">4. FLIGHT NO.<br> {{ $booking_entry->first_flight }}</td>
            </tr>
            <tr>
                <td>5. PORT OF LOADING<br>{{ strtoupper($booking_entry->origin_id > 0 ? $booking_entry->origin->name : "" )}}</td>
                <td>6. PORT OF UNLOADING<br> {{ strtoupper($booking_entry->destination_id >0 ? $booking_entry->destination->name : "") }}</td>
                <td>7. DATE<br>{{ $booking_entry->date }}</td>
            </tr>
            <tr>
                <td>ITEMS 8 AND 9 ARE USE IN CONSOLIDATION SHIPMENTS ONLY</td>
                <td>8. CONSOLIDATOR<br>{{ strtoupper(($booking_entry->consignee_id > 0 and $booking_entry->shipment_type = 'C' ) ? $booking_entry->consignee->name : "") }}</td>
                <td>9. DE-CONSOLIDATOR<br>{{ strtoupper(($booking_entry->carrier_id > 0 and $booking_entry->shipment_type = 'C') ? $booking_entry->carrier->name : "") }}</td>
            </tr>
            </tbody>
        </table>
        </div>
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td width="5%">10. AWB TYPE</td>
                    <td width="20%">11. AIRWAY BILL NO</td>
                    <td width="5%">12. NO OF PIECES</td>
                    <td width="10%">13. WEIGHT (Kg)</td>
                    <td width="5%">14. NO. OF HAWB</td>
                    <td width="20%">15. SHIPPER NAME AND ADDRESS</td>
                    <td width="20%">16. CONSIGNEE NAME AND ADDRESS</td>
                    <td width="15%">17. NATURE OF GOODS</td>

                </tr>
                </thead>
                <tbody>
                <?php $pieces=0; $weight=0;  ?>
                    @foreach($booking_entry->airwaybill as $airway_bill)
                        @if($airway_bill->awb_class != 3)
                            <tr>
                                <td>{{ $airway_bill->awb_class == '1'? 'DAWB': 'HAWB' }}</td>
                                <td>{{ $airway_bill->code }}
                                    <p class="code-bar">{{ $type== 1? "": $airway_bill->code  }}</p></td>
                                <td>{{ $airway_bill->sum_pieces }}</td>
                                <td>{{ $airway_bill->sum_weight}}</td>
                                <td></td>
                                <td>
                                    {{ strtoupper($airway_bill->shipper_id >0 ? $airway_bill->shipper->name : "") }} <br>
                                    {{ strtoupper($airway_bill->shipper_id >0 ? $airway_bill->shipper->address : "") }}
                                </td>
                                <td>
                                    {{ strtoupper($airway_bill->consignee_id >0 ? $airway_bill->consignee->name : "") }} <br>
                                    {{ strtoupper($airway_bill->consignee_id >0 ? $airway_bill->consignee->address : "") }}
                                </td>
                                <td>{{ strtoupper($airway_bill->cargo_notes) }}</td>
                            </tr>

                            <?php $pieces+= $airway_bill->sum_pieces; ?>
                            <?php $weight+= $airway_bill->sum_weight; ?>
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" align="right"><strong>TOTAL PIECES: </strong></td>
                        <td>{{ $pieces }}</td>
                        <td align="right"><strong>WEIGHT: </strong></td>
                        <td>{{ $weight }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>



</div>
</body>

</html>