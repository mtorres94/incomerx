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
    <style type="text/css">
        .page {
            overflow: hidden;
            page-break-after: always;
        }
    </style>
</head>

<body>
@for ($key = 1 ; $key <= $bill_of_lading->total_pieces ; $key++)

    @foreach($bill_of_lading->cargo as $detail)
        <div class="page">
            <div class="row row-padding">
                <div class="col-xs-5">
                    <div class="company-info">
                        <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                        <p>7270 NW 35 TERRACE</p>
                        <p>MIAMI, FLORIDA 33122</p>
                    </div>
                    <div class="info shipper-info">
                        <p class="label-content"><strong>SHIPPER:</strong></p>
                        <p class="p-content">{{ strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->name : "") }}</p>
                    </div>
                    <div class="info consignee-info">
                        <p class="label-content"><strong>CONSIGNEE:</strong></p>
                        <p class="p-content">{{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "") }}</p>
                    </div>
                    <div class="info consignee-info">
                        <p class="label-content"><strong>HAWB:</strong></p>
                        <p class="p-content">{{ $bill_of_lading->code }}</p>
                    </div>
                    <div class="info consignee-info">
                        <p class="label-content"><strong>BOOKING:</strong></p>
                        <p class="p-content"> {{ strtoupper($bill_of_lading->booking_code) }}</p>
                    </div>
                    <div class="info consignee-info">
                        <p class="label-content"><strong>TO:</strong> {{ strtoupper($bill_of_lading->port_unloading_id > 0 ? $bill_of_lading->unloading->name : "") }}</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="label-content label-wh"><strong>HBL #:</strong></p>
                    </div>
                    <div class="col-xs-7 date">
                        <p class="label-content label-date"><strong>DATE IN: {{ $bill_of_lading->date }}</strong></p>
                    </div>
                    <div class="warehouse">
                        {{ $bill_of_lading->code }}
                    </div>
                    <div class="col-xs-4 unit-metrics">
                        <p class="label-units"><strong>CUBIC CFT</strong></p>
                        <p class="p-units">{{ round($bill_of_lading->total_cubic, 0) }} </p>
                    </div>
                    <div class="col-xs-5 center-unit unit-metrics">
                        <p class="label-units"><strong>CUBIC CBM </strong></p>
                        <p class="p-units">{{ round($bill_of_lading->total_cubic_cbm, 0) }} </p>
                    </div>
                    <div class="col-xs-3 unit-metrics">
                        <p class="label-units"><strong>PIECES</strong></p>
                        <p class="p-units">{{ $key }} of {{ $bill_of_lading->total_pieces }}</p>
                    </div>
                    <div class="col-xs-12 barcode-label">
                        <p class="label-units-code"><strong>{{ $bill_of_lading->code }}-{{ str_pad($detail->line, 2, '0', 0) }}-{{ str_pad($key, 3, '0', 0) }}</strong></p>
                        <div style="text-align: center;">
                            {!! DNS2D::getBarcodeSVG(
                                Crypt::encrypt(collect([
                                    'shipper'     => strtoupper($bill_of_lading->shipper->name),
                                    'consignee'   => strtoupper($bill_of_lading->consignee->name),
                                    'date_in'     => strtoupper($bill_of_lading->date),
                                    'destination' => strtoupper($bill_of_lading->unloading->code),
                                    'cargo'       => $bill_of_lading->code.'-'.str_pad($detail->line, 2, '0', 0).'-'.str_pad($key, 3, '0', 0)
                                ])->toJson())
                            , "QRCODE", 2, 2) !!}
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        @endfor

</body>

</html>