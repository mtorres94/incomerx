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
@for ($key = 1 ; $key <= $airway_bill->total_pieces ; $key++)

    @foreach($airway_bill->cargo_details as $detail)
        <div class="page">
            <div class="row row-padding">
                <div class="col-xs-5">
                    <div class="company-info">
                        <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                        <p>7270 NW 35 TERRACE</p>
                        <p>MIAMI, FLORIDA 33122</p>
                    </div>
                    <div class="info">
                        <p class="label-content"><strong>SHIPPER:</strong></p>
                        <p class="p-content">{{ strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->name : "") }}</p>
                    </div>
                    <div class="info">
                        <p class="label-content"><strong>CONSIGNEE:</strong></p>
                        <p class="p-content">{{ strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->name : "") }}</p>
                    </div>
                    <div class="col-xs-4">
                        <p class="label-units"><strong>HAWB:</strong></p>
                    </div>
                    <div class="col-xs-4">
                        <p class="label-units"><strong>DATE IN:</strong></p>
                    </div>
                    <div class="col-xs-4">
                        <p class="label-units">{{ $airway_bill->date }}</p>
                    </div>
                    <div class="col-xs-12">
                        <p class="p-content" align="center"><strong>{{ $airway_bill->code }}</strong></p>
                    </div>
                    <div class="col-xs-6">
                        <p class="label-units"><strong>MAWB:</strong></p>
                    </div>
                    <div class="col-xs-12" style="border-bottom: 1px solid;" align="center">
                        <h5 class="p-content" align="center"><strong>{{ $airway_bill->booking_code }}</strong></h5>
                    </div>
                    <div class="col-xs-4">
                        <p class="label-units"><strong>DESTINATION</strong></p>
                        <p class="p-units">{{ $airway_bill->destination_id > 0 ? strtoupper($airway_bill->destination->code) : ""}} </p>
                    </div>
                    <div class="col-xs-5 center-unit">
                        <p class="label-units"><strong>WEIGHT </strong></p>
                        <p class="p-units">{{ round($airway_bill->total_gross_weight, 3) }} </p>
                    </div>
                    <div class="col-xs-3">
                        <p class="label-units"><strong>PIECES</strong></p>
                        <p class="p-units">{{ $key }} of {{ round($airway_bill->total_pieces, 0) }}</p>
                    </div>
                    <div class="col-xs-12 barcode-label">
                        <p class="label-units-code"><strong>{{ $airway_bill->code }}-{{ str_pad($detail->line, 2, '0', 0) }}-{{ str_pad($key, 3, '0', 0) }}</strong></p>
                        <div style="text-align: center;">
                            {!! DNS2D::getBarcodeSVG(
                                Crypt::encrypt(collect([
                                    'shipper'     => strtoupper($airway_bill->shipper->name),
                                    'consignee'   => strtoupper($airway_bill->consignee->name),
                                    'date_in'     => strtoupper($airway_bill->date),
                                    'mawb'     => strtoupper($airway_bill->booking_code),
                                    'cargo'       => $airway_bill->code.'-'.str_pad($detail->line, 2, '0', 0).'-'.str_pad($key, 3, '0', 0)
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