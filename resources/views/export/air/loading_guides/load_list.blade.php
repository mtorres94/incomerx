<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $loading_guide->code }}</title>
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
                <h5><strong>LOAD LIST</strong></h5>
                <p class="document_number"><strong>{{ $loading_guide->code }}</strong></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table table-bordered">
                <tr>
                    <td><p><strong>AIRLINE: </strong></p></td>
                    <td><p>{{ strtoupper($loading_guide->carrier_id >0 ? $loading_guide->carrier->name: "") }} </p></td>
                    <td><p><strong>FILE #: </strong></p></td>
                    <td><p> {{ $loading_guide->shipment_id > 0 ? $loading_guide->shipment->code : "" }}</p></td>
                    <td><p><strong>CUT OFF: </strong></p></td>
                    <td><p> {{ $loading_guide->date}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>FLIGHT #: </strong></p></td>
                    <td><p> {{ $loading_guide->flight}}</p></td>
                    <td><p><strong>MAWB#: </strong></p></td>
                    <td><p> {{ $loading_guide->booking_code }}</p></td>
                    <td><p><strong>PREPARED: </strong></p></td>
                    <td><p> {{ $loading_guide->user_create_id > 0 ? $loading_guide->user_create->name : "" }} </p></td>
                </tr>
                <tr>
                    <td><p><strong>DEPARTURE: </strong></p></td>
                    <td><p> {{ $loading_guide->departure_date}} </p></td>
                    <td><p><strong>DESTINATION: </strong></p></td>
                    <td><p> {{strtoupper($loading_guide->destination_id >0 ? $loading_guide->destination->name : "")}}</p></td>
                    <td><p><strong>VERIFY: </strong></p></td>
                    <td><p>  </p></td>
                </tr>
            </table>
        </div>
    </div>
   <div class="row">
       <div class="col-md-12">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="10%" valign="bottom"><strong>WH SE NO#</strong></th>
                    <th width="10%" valign="bottom"><strong>HBL</strong></th>
                    <th width="5%" valign="bottom"><strong> PCS</strong></th>
                    <th width="5%" valign="bottom"><strong> DEST</strong></th>
                    <th width="10%" valign="bottom"><strong>WEIGHT LBS</strong></th>
                    <th width="10%" valign="bottom"><strong>WEIGHT KGS</strong></th>
                    <th width="10%" valign="bottom"><strong>VOL. KGS</strong></th>
                    <th width="10%" valign="bottom"><strong>PO#</strong></th>
                    <th width="10%" valign="bottom"><strong>LOC</strong></th>
                    <th width="20%" valign="bottom"><strong>CONSIGNEE</strong></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($loading_guide->receipt_entry as $receipt_entry)
                        <tr>
                            <td>{{ $receipt_entry->code }}</td>
                            <td>{{ $receipt_entry->ea_airwaybill_id > 0 ? $receipt_entry->airwaybill->code : ""}}</td>
                            <td>{{ $receipt_entry->sum_pieces }}</td>
                            <td>{{ ($loading_guide->destination_id > 0 ? strtoupper($loading_guide->destination->code) : "") }}</td>
                            <td>{{ $receipt_entry->sum_weight }}</td>
                            <td>{{ round($receipt_entry->sum_weight/ 2.2, 3) }}</td>
                            <td>{{ $receipt_entry->sum_volume_weight }}</td>
                            <td></td>
                            <td></td>
                            <td>{{ strtoupper($receipt_entry->consignee_id > 0 ? $receipt_entry->consignee->name : "") }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" align="right"><strong>TOTAL PIECES: </strong></td>
                        <td>{{ $loading_guide->sum_total_pieces }}</td>
                        <td colspan="2" align="right"><strong>TOTAL WEIGHT: </strong></td>
                        <td>{{ $loading_guide->sum_total_weight }}</td>
                        <td colspan="2" align="right"><strong>TOTAL VOLUME: </strong></td>
                        <td>{{ $loading_guide->sum_total_volume }}</td>
                    </tr>
                </tfoot>
                </table>

        </div>
    </div>
  </div>
</body>

</html>