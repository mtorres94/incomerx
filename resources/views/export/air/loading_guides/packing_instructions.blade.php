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
        <div class="pull-right resume-table">
            <div class="col-xs-4"><strong>DATE:</strong></div>
            <div class="col-xs-8">{{ $loading_guide->date }}</div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
            <tbody>
                <tr>
                    <td width="15%"><strong>FILE #</strong></td>
                    <td width="20%" >{{ ($loading_guide->shipment_id > 0 ? $loading_guide->shipment->code: "") }}</td>
                    <td width="15%"><strong>BOOKING #</strong></td>
                    <td width="15%">{{ ($loading_guide->booking_code) }}</td>
                    <td width="10%"></td>
                    <td width="20%"></td>
                </tr>
                <tr><td height="10px"></td></tr>
                <tr>
                    <td><strong>CUSTOMER: </strong></td>
                    <td colspan="3" style="border-bottom:1px solid;">{{ $loading_guide->shipper_id > 0 ? $loading_guide->shipper->name : "" }}</td>
                </tr>
                <tr><td height="10px"></td></tr>
                <tr>
                    <td><strong>DELIVER TO:</strong></td>
                    <td colspan="3">{{ strtoupper($loading_guide->destination_id > 0 ? $loading_guide->destination->name : "") }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td height="10px"></td></tr>
                <tr>
                    <td><strong>FREIGHT:</strong></td>
                    <td >AIR FREIGHT</td>
                    <td><strong>CUT OFF DATE:</strong></td>
                    <td>{{ $loading_guide->cut_off_date }}</td>
                </tr>
                <tr><td height="10px"></td></tr>
                <tr>
                    <td><strong>DESTINATION:</strong></td>
                    <td>{{strtoupper( $loading_guide->destination_id >0 ? $loading_guide->destination->name : "") }}</td>
                    <td><strong>ETA:</strong></td>
                    <td>{{ $loading_guide->arrival_date }}</td>
                    <td><strong>VIA:</strong></td>
                    <td>{{strtoupper( $loading_guide->via_id >0 ? $loading_guide->via->name : "") }}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <br>

    <div class="company-info">
        <p><strong>SPECIAL INSTRUCTIONS</strong></p>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="resume-table table-bordered" width="50%" align="center">
                <tbody>
                <tr>
                    <td>WRH#</td>
                    <td>PO#</td>
                    <td>PIECES</td>
                    <td>POUNDS</td>
                </tr>
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
<div class="company-info">
    <p><strong>PACKING:</strong></p>
</div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-bordered">
            <tbody>
            <tr>
                <td>CRATES</td>
                <td>CONTAINERS</td>
                <td>BOXES</td>
                <td>PALLETS</td>
                <td>DIMENSIONS</td>
                <td>CUBIC FT</td>
                <td>WEIGHT</td>
                <td>PRICE</td>
            </tr>
            @for($x=0; $x < 10; $x++)
                <tr>
                    <td height="15px"></td>
                    <td height="15px"></td>
                    <td height="15px"></td>
                    <td height="15px"></td>
                    <td height="15px"></td>
                    <td height="15px"></td>
                    <td height="15px"></td>
                    <td height="15px"></td>
                </tr>
            @endfor
            </tbody>
        </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
           <table class="table resume-table">
               <tr>
                   <td align="right"><strong>TOTAL:</strong></td>
                   <td style="border-bottom: 1px solid;"></td>
               </tr>
               <tr>
                   <td height="10px"></td>
               </tr>
               <tr>
                   <td align="right"><strong>PACKED BY:</strong></td>
                   <td style="border-bottom: 1px solid; "></td>
               </tr>
           </table>
        </div>
    </div>
</div>
@endforeach
</body>

</html>