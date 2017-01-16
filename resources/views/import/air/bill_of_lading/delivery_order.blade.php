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
    <div class="col-xs-6">
        <div class="row">
            <div class="">
                <h5><strong>DELIVERY ORDER</strong></h5>
                <div class="col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">DATE</div>
                        <div class="panel-body"><p>{{ $bill_of_lading->bl_date }}</p></div>
                    </div>
                </div>
                <div class="col-xs-4"><p class="document_number">{{ $bill_of_lading->our_reference }}</p></div>
            </div>
        </div>
    </div>
    <div class="row row-padding">
        <div class="col-xs-6 pull-right">
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

    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <th>IMPORTING CARRIER</th>
                <th>FROM PORT OF / ORIGIN AIRPORT</th>
                <th>OUR REFERENCE NUMBER</th>
                <th>ARRIVAL DATE</th>
                <th>FREE TIME EXP.</th>
                </thead>
                <tbody>
                <tr>
                    <td>{{ strtoupper($bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->name : "") }}</td>
                    <td>{{ strtoupper($bill_of_lading->port_loading_id >0 ? $bill_of_lading->port_loading_name->name : "") }}</td>
                    <td>{{ strtoupper($bill_of_lading->our_reference) }}</td>
                    <td>{{ ($bill_of_lading->arrival_date) }}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <th align="center">LOCATION OF MERCHANDISE</th>
                </thead>
                <tbody>
                <tr>
                    <td align="center"><h5>{{ strtoupper($bill_of_lading->location_address) }}</h5></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <tbody>
                <tr>
                    <td width="10%"><strong>DELIVERY TO</strong></td>
                    <td width="450%">
                        <p>Contact:</p>
                        <p>Phone / Fax: </p>
                    </td>
                    <td width="45%"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <th width="35%">BROKER / IMPORTER NAME</th>
                <th width="35%">AUTHORIZED BIG NATURE</th>
                <th width="30%">FREIGHT CHARGES</th>
                </thead>
                <tbody>
                <tr>
                    <td>{{ ($bill_of_lading->broker_id >0 ? $bill_of_lading->broker->name : "" ) }}</td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <th width="60%">TRUCKING COMPANY NAME</th>
                <th width="25%">DATE AND SIGNATURE OF RECEIVER</th>
                <th width="15%">NO PKG. & REC.D</th>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <th width="15%">IMPORTING CARRIER AND BL OR AWB NO.</th>
                <th width="25%">MARKS & NUMBERS</th>
                <th width="15%">ENTRY NUMBER</th>
                <th width="10%">PKG. BY ENTRY</th>
                <th width="25%">DESCRIPTION OF GOODS</th>
                <th width="10%">GROSS WEIGHT</th>
                </thead>
                <tbody>
                @foreach($bill_of_lading->cargo as $detail)
                    <tr>
                        <td>{{ $bill_of_lading->code }}</td>
                        <td>{{ $bill_of_lading->marks }}</td>
                        <td></td>
                        <td>{{ $bill_of_lading->pieces }}</td>
                        <td>{{ $bill_of_lading->description }}</td>
                        <td>{{ $bill_of_lading->grossw }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right"><strong>{{ $bill_of_lading->total_pieces }}</strong></td>
                    <td style="text-align: right"><strong>TOTAL:</strong></td>
                    <td><strong>{{ $bill_of_lading->total_gross_weight }}</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p class="document_number">COMMENTS:</p>
        </div>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12 ">
            <table width="100%">
                <tr class="footer-sign">
                    <td align="center" valign="center"><p></p></td>
                    <td width="5%"></td>
                    <td align="center" valign="center"><p></p></td>
                    <td></td>
                    <td align="center" valign="center"><p></p></td>
                </tr>
                <tr>
                    <td width="10%" ><p class="document_number"><strong>DELIVERY BY</strong></p></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td width="5%"></td>
                    <td width="30%" align="center"  class="footer-sign-td"><p><strong>NAME</strong></p></td>
                    <td width="5%"  ></td>
                    <td width="30%" align="center" class="footer-sign-td"><p><strong>SIGNATURE</strong></p></td>
                </tr>
                <tr class="footer-sign">
                    <td align="center" valign="center"><p></p></td>
                    <td width="5%"></td>
                    <td align="center" valign="center"><p></p></td>
                    <td></td>
                    <td align="center" valign="center"><p></p></td>
                </tr>
                <tr >
                    <td width="10%" ><p class="document_number"><strong>RECEIVED BY</strong></p></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td width="5%"></td>
                    <td width="30%" align="center"  class="footer-sign-td"><p><strong>NAME</strong></p></td>
                    <td width="5%"  ></td>
                    <td width="30%" align="center" class="footer-sign-td"><p><strong>SIGNATURE</strong></p></td>
                </tr>
            </table>
        </div>
    </div>


</div>
</body>

</html>
