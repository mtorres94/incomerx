<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('css/metro-bootstrap.min.css') !!}

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
    {!! Html::style('css/label.css') !!}

    <!-- Font Awesome -->
    {!! Html::style('css/font-awesome.min.css') !!}

    <!-- Ionicons -->
    {!! Html::style('css/ionicons.min.css') !!}
</head>

<body>
    @foreach($receipt_entry->cargo_details as $detail)
        <div class="row row-padding">
            <div class="col-xs-4">
                <div class="company-info">
                    <h4><strong>VECO LOGISTICS MIAMI INC.</strong></h4>
                    <p>7270 NW 35 TERRACE</p>
                    <p>MIAMI, FLORIDA 33122</p>
                </div>
                <div class="info shipper-info">
                    <p class="label-content"><strong>SHIPPER:</strong></p>
                    <p class="p-content">{{ strtoupper($receipt_entry->shipper->name) }}</p>
                </div>
                <div class="info consignee-info">
                    <p class="label-content"><strong>CONSIGNEE:</strong></p>
                    <p class="p-content">{{ strtoupper($receipt_entry->consignee->name) }}</p>
                </div>
                <div class="col-xs-5">
                    <p class="label-content label-wh"><strong>WH #:</strong></p>
                </div>
                <div class="col-xs-7 date">
                    <p class="label-content label-date"><strong>DATE IN: {{ $receipt_entry->date_in }}</strong></p>
                </div>
                <div class="warehouse">
                    {{ $receipt_entry->warehouse_code }}
                </div>
                <div class="col-xs-4 unit-metrics">
                    <p class="label-units"><strong>UNIT WEIGHT</strong></p>
                    <p class="p-units">{{ round($detail->total_weight, 0) }} L</p>
                </div>
                <div class="col-xs-5 center-unit unit-metrics">
                    <p class="label-units"><strong>TOTAL WEIGHT</strong></p>
                    <p class="p-units">{{ round($receipt_entry->sum_weight, 0) }} L</p>
                </div>
                <div class="col-xs-3 unit-metrics">
                    <p class="label-units"><strong>PIECES</strong></p>
                    <p class="p-units">{{ $detail->line }} of {{ $receipt_entry->cargo_details->count() }}</p>
                </div>
                <div class="col-xs-6 country-label">
                    <p class="label-units"><strong>DESTINATION COUNTRY:</strong></p>
                    <p class="country"><strong>{{ strtoupper($receipt_entry->destination->code) }}</strong></p>
                </div>
                <div class="col-xs-6">
                    <p class="label-units"><strong>PO #:</strong></p>
                </div>
                <div class="col-xs-12 barcode-label">
                    <p class="label-units"><strong>BARCODE:</strong></p>
                    <p class="code-bar">{{ $receipt_entry->warehouse_code }}-{{ str_pad($detail->line, 2, '0', 0) }}-{{ str_pad($receipt_entry->cargo_details->count(), 3, '0', 0) }}</p>
                    <p class="legend-barcode">{{ $receipt_entry->warehouse_code }}-{{ str_pad($detail->line, 2, '0', 0) }}-{{ str_pad($receipt_entry->cargo_details->count(), 3, '0', 0) }}</p>
                </div>
            </div>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    @endforeach
</body>

</html>