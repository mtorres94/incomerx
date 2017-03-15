<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ strtoupper($report->code) }}</title>
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
            <div class="row">
                <div class="document-info pull-right">
                    <h5><strong>OCEAN CARGO MANIFEST</strong></h5>
                    <p class="code-bar">{{ $shipment_entry->code }}</p>
                    <p class="document_number"><strong>{{ strtoupper($shipment_entry->code) }}</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12">
            <table class="table-report">
                <thead>
                <th>Dest</th>
                <th>Date</th>
                <th>WR #</th>
                <th>Shipper</th>
                <th>Consignee</th>
                @if($type == 1)
                    <th class="number">Qty</th>
                    <th class="number">Weight</th>
                    <th class="number">Cubic</th>
                    <th class="number">Vol. Weight</th>
                @endif
                </thead>
                <tbody>
                    @foreach($report as $bill_of_lading)
                        <tr>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>