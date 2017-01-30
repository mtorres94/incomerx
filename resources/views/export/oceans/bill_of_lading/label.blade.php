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
@foreach($bill_of_lading->cargo as $detail)
    <div class="row row-padding">
        <div class="col-xs-4">
            <div class="company-info">
                <h4><strong>VECO LOGISTICS MIAMI INC.</strong></h4>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
            </div>
            <div class="info shipper-info">
                <p class="label-content">{{ strtoupper($bill_of_lading->carrier_id > 0 ? $bill_of_lading->carrier->name : "") }}</p>
            </div>
            <div class="info consignee-info">
                <p class="label-content"><strong>BOOKING: </strong></p>
                <p class="p-content">{{ strtoupper($bill_of_lading->booking_code)  }}</p>
            </div>
            <div class="info consignee-info">
                <p class="label-content"><strong>TO: </strong>{{ strtoupper($bill_of_lading->port_unloading_id > 0 ? $bill_of_lading->unloading->name : "")  }}</p>
            </div>
            <div class="info consignee-info">
                <p class="label-content"><strong>HBL: </strong>{{ strtoupper($bill_of_lading->code)  }}</p>
            </div>
            <div class="info consignee-info">
                <p class="p-content">{{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "")  }}</p>
            </div>


    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
@endforeach
</body>

</html>