<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bill of Lading {{ $airway_bill->code }}</title>
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
            <div  class="company-info" >
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
                <p>Phone: 305-5992703 / Fax: 305-5992925</p>
                <p>www.vecologistics.com</p>

            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div align="center" class="company-info" >
            <h5><u><strong>CERTIFICATION STATEMENT</strong></u></h5>
            <p><i>{{ $type =='6' ? '(unknown-shipper)' : '(known shipper)' }}</i></p>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="company-info">
            <p><i>Date:   <u>{{ $airway_bill->date }}</u></i></p>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
      <div class="document_number">
          <p><i><strong>VECO LOGISTICS MIAMI</strong>, is in compliance with its TSA-Approved security program and all
                  applicable security directives. Our number assigned by TSA is: <strong>{{ $airway_bill->account_number }}</strong> . This shipment
                  contains cargo originating from an unknown shipper not exempted by TSA. This shipment must be
                  transported ONLY on an <u>ALL-CARGO AIRCRAFT</u>. The individual whose name appears bellow
                  certifies that he or she is an employee or authorized representative of <strong>VECO LOGISTICS MIAMI</strong>,
                  and understands that any fraudulent or false statement made in connection with this certification
                  may subject this individual and <strong>VECO LOGISTICS MIAMI</strong> to both civil penalties under 49 CFR
                  1540.103(b) and fines and/ or inprisonment of not more than 5 years under Title 18 U.S.C. 1001.
              </i> </p>
      </div>
    </div>
    <div class="row">
        <div class="document_number">
            <table align="center">
                <tr>
                    <td><p><strong><i><u>Identification of each item under 16 ounces</u></i></strong></p></td>
                    <td><p><i>NONE piece count</i></p></td>
                </tr>
                <tr>
                    <td><p><strong><i><u>Master AirwayBill Number</u></i></strong></p></td>
                    <td><p><i>{{ $airway_bill->booking_code }}</i></p></td>
                </tr>
                <tr>
                    <td><p><strong><i><u>Destination</u></i></strong></p></td>
                    <td><p><i>{{ strtoupper($airway_bill->destination_id > 0 ? $airway_bill->destination->name : "")}}</i></p>
                    </td>
                </tr>
                <tr>
                    <td><p><strong><i>VECO LOGISTICS MIAMI Representative</i></strong></p></td>
                    <td><p><i>{{ $airway_bill->user_create_id > 0 ? $airway_bill->user_create->name : ""}}</i></p></td>
                </tr>
                <tr>
                    <td align="right"><p><strong><i>Signature</i></strong></p></td>
                    <td style="border-bottom: black 1px solid"><p></p></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">

                        <h5><i><u>ALL CARGO AIRCRAFT ONLY</u></i></h5>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>

</html>