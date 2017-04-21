<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ strtoupper($airway_bill->booking_code) }}</title>
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
    <h4 align="center"><i><u>SHIPPER'S CONSENT TO SCREEN CARGO</u></i></h4>
    <br>
    <p>VECO LOGISTICS MIAMI<br>
    7270 NW 35 TERRACE<br>
    MIAMI, FLORIDA 33122<br>
    Phone: 305-5992703 / Fax: 305-5992925<br>
    www.vecologistics.com<br>
    Email: fpuga@vecologistics.com</p>
    <br>
    <p>{{ $airway_bill->date }}</p>
    <br>
    <p>Re: Shipper’s Consent Letter</p>
    <p>To whom it may concern:</p>
    <p>In accordance with TSA Regulations, this letter authorizes: VECO LOGISTICS MIAMI,
    and/or each of their offices or branches to screen all cargo tendered by our company from
        the date of this notification forward until revoked in writing.</p>
    <br>
    <p>We are also aware that a physical inspection may be required, in which case we do not
    hold VECO LOGISTICS MIAMI accountable for any damage or delay due to the opening of
        any cargo, repackaging or any impact on transit times associated with this screening.</p>
    <br>
    <p>We understand that VECO LOGISTICS MIAMI must refuse to offer our cargo for
    transportation by air (passenger or freighter aircraft) should we not consent to the cargo
        Screened per TSA Regulations.</p>
    <br>
    <p>Sincerely,</p><br><br><br>
    <p style="border-top:1px solid; width:200px;" >Name:</p>
    <p>Title:</p><br>
    <p>Company Name:</p>
    <p>Address:</p>
    <p>Phone:</p><br>
    <p>Date: {{ $airway_bill->date }}</p>
</div>
</body>

</html>