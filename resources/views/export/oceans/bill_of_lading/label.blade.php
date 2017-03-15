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
@for ($key = 1 ; $key <= $bill_of_lading->total_pieces ; $key++)
@foreach($bill_of_lading->cargo as $detail)
    <div class="row row-padding">
        <div class="col-xs-4">
            <div class="company-info">
                <h4><strong>VECO LOGISTICS MIAMI INC.</strong></h4>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
            </div>
            <div class="info shipper-info">
                <p class="label-content"><strong>CARRIER:</strong></p>
                <p class="p-content">{{ strtoupper($bill_of_lading->carrier_id > 0 ? $bill_of_lading->carrier->name : "") }}</p>
            </div>
            <div class="info consignee-info">
                <p class="label-content"><strong>CONSIGNEE:</strong></p>
                <p class="p-content">{{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "") }}</p>
            </div>
            <div class="info consignee-info">
                <p class="label-content"><strong>BOOKING:</strong> {{ strtoupper($bill_of_lading->booking_code) }}</p>
            </div>
            <div class="info consignee-info">
                <p class="label-content"><strong>TO:</strong> {{ strtoupper($bill_of_lading->port_unloading_id > 0 ? $bill_of_lading->unloading->name : "") }}</p>
            </div>
            <div class="col-xs-5">
                <p class="label-content label-wh"><strong>HBL #:</strong></p>
            </div>
            <div class="col-xs-7 date">
                <p class="label-content label-date"><strong>DATE IN: {{ $bill_of_lading->bl_date }}</strong></p>
            </div>
            <div class="warehouse">
                {{ $bill_of_lading->code }}
            </div>
            <div class="col-xs-4 unit-metrics">
                    <p class="label-units"><strong>CUBIC KGS</strong></p>
                <p class="p-units">{{ round($bill_of_lading->total_cubic_cft, 0) }} </p>
            </div>
            <div class="col-xs-5 center-unit unit-metrics">
                <p class="label-units"><strong>CUBIC CBM </strong></p>
                <p class="p-units">{{ round($bill_of_lading->total_cubic_cbm, 0) }} </p>
            </div>
            <div class="col-xs-3 unit-metrics">
                <p class="label-units"><strong>PIECES</strong></p>
                <p class="p-units">{{ $key }} of {{ $bill_of_lading->total_pieces }}</p>
            </div>
            <div class="col-xs-12 ">
                <p class="label-units"><strong>BARCODE:</strong></p>
                <p class="code-bar">{{ $bill_of_lading->code }}-{{ str_pad($key, 2, '0', 0) }}-{{ str_pad($bill_of_lading->total_pieces, 3, '0', 0) }}</p>
                <p class="legend-barcode">{{ $bill_of_lading->code }}-{{ str_pad($key, 2, '0', 0) }}-{{ str_pad($bill_of_lading->total_pieces, 3, '0', 0) }}</p>
            </div>
        </div>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
@endforeach
@endfor
</body>

</html>