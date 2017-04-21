<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $bill_of_lading->code }}</title>
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
            <div class="document-info pull-right">
                <h5><strong>SHIPMENT ADVISE</strong></h5>
                {!! DNS2D::getBarcodeSVG(
        $bill_of_lading->code
           , "QRCODE", 2, 2) !!}
                <p class="document_number">{{ $bill_of_lading->code }}</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table">
                <tr>
                    <td width="15%" align="right" height="20px"><strong>Date</strong></td>
                    <td width="85%">{{ $bill_of_lading->date }}</td>
                </tr>
                <tr>
                    <td width="15%" align="right" height="20px"><strong>To</strong></td>
                    <td width="85%" height="70px"></td>
                </tr>
                <tr>
                    <td width="15%" align="right" height="20px"><strong>Contact:</strong></td>
                    <td width="85%"></td>
                </tr>
                <tr>
                    <td width="15%" align="right" height="20px"><strong>Phone:</strong></td>
                    <td width="85%"></td>
                </tr>
                <tr>
                    <td width="15%" align="right" height="20px"><strong>Fax:</strong></td>
                    <td width="85%"></td>
                </tr>


            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table">
                <tr>
                    <td colspan="4" align="center">
                        The following is to announce that your shipment with the below reference #s<br>
                        has arrived at our facilities.<br>
                    </td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td width="15%" align="right" height="20px"><strong>File: </strong></td>
                    <td>{{ strtoupper($bill_of_lading->shipment_code) }}</td>
                    <td width="15%" align="right"><strong>Pieces: </strong></td>
                    <td>{{ round($bill_of_lading->total_pieces) }}</td>
                </tr>
                <tr>
                    <td width="15%" align="right" height="20px"><strong>Mawb: </strong></td>
                    <td>{{ strtoupper($bill_of_lading->mbl_code) }}</td>
                    <td width="15%" align="right"><strong>Weight: </strong></td>
                    <td>{{ round($bill_of_lading->total_gross_weight) }} &nbsp;{{ $bill_of_lading->total_weight_unit == 'L' ? "Lbs" : "Kgs" }}</td>
                </tr>
                <tr>
                    <td width="15%" align="right" height="20px"><strong>Hawb: </strong></td>
                    <td>{{ strtoupper($bill_of_lading->code) }}</td>
                    <td width="15%" align="right"><strong>Chargeable Weight: </strong></td>
                    <td> {{ round($bill_of_lading->total_gross_weight) }}&nbsp;{{ $bill_of_lading->total_weight_unit == 'L' ? "Lbs" : "Kgs" }}</td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12" align="center">
            <p class="resume-table">Please contact us at your earliest convenience with release instructions.</p>
        </div>
    </div>

</div>
</body>

</html>
