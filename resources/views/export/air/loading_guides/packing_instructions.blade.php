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
@foreach($loading_guide->container as $container)
<div class="page">
    <div class="row row-padding">
        <div align="center">
            <div class="row company-info">
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
            </div>
            <div class="row company-info">
                <h5><strong>PACKING INSTRUCTIONS</strong></h5>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
            <tbody>
                <tr>
                    <td width="15%"><strong>FILE #</strong></td>
                    <td width="20%">{{ ($loading_guide->shipment_id > 0 ? $loading_guide->shipment->code: "") }}</td>
                    <td width="15%"><strong>BOOKING #</strong></td>
                    <td width="15%">{{ ($loading_guide->booking_code) }}</td>
                    <td width="10%"></td>
                    <td width="20%"></td>
                </tr>
                <tr>
                    <td><strong>CUSTOMER: </strong></td>
                    <td colspan="3" style="border-bottom: black">{{ $loading_guide->shipper_id > 0 ? $loading_guide->shipper->name : "" }}</td>
                </tr>
                <tr>
                    <td><strong>DELIVER TO:</strong></td>
                    <td colspan="3" style="border-bottom: black">{{ strtoupper($loading_guide->destination_id > 0 ? $loading_guide->destination->name : "") }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>FREIGHT:</strong></td>
                    <td style="border-bottom: black">AIR FREIGHT</td>
                    <td><strong>CUT OFF DATE:</strong></td>
                    <td style="border-bottom: black">{{ $loading_guide->cut_off_date }}</td>
                </tr>
                <tr>
                    <td><strong>DESTINATION:</strong></td>
                    <td style="border-bottom: black">AIR FREIGHT</td>
                    <td><strong>ETA:</strong></td>
                    <td style="border-bottom: black">{{ $loading_guide->arrival_date }}</td>
                    <td><strong>VIA:</strong></td>
                    <td style="border-bottom: black">{{strtoupper( $loading_guide->via_id >0 ? $loading_guide->via->name : "") }}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="document_number">
                SPECIAL INSTRUCTIONS
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed" width="50%">
            <thead>
                <tr>
                    <th>WRH#</th>
                    <th>PO#</th>
                    <th>PIECES</th>
                    <th>POUNDS</th>
                </tr>
            </thead>
            <tbody>
            @foreach($loading_guide->receipt_entry as $receipt_entry)
                <tr>
                    <td>{{ $receipt_entry->code }}</td>
                    <td></td>
                    <td>{{ $receipt_entry->sum_pieces }}</td>
                    <td>{{ $receipt_entry->sum_weight }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
            <thead>
            <tr>
                <th>CRATES</th>
                <th>CONTAINERS</th>
                <th>BOXES</th>
                <th>PALLETS</th>
                <th>DIMENSIONS</th>
                <th>CUBIC FT</th>
                <th>WEIGHT</th>
                <th>PRICE</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
           <table class="table resume-table">
               <tr>
                   <td><strong>TOTAL:</strong></td>
               </tr>
               <tr>
                   <td><strong>PACKED BY:</strong></td>
                   <td style="border-bottom: black"></td>
               </tr>
           </table>
        </div>
    </div>
</div>
@endforeach
</body>

</html>