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
            <h5><strong>PICK UP ORDER / D.O</strong></h5>
            <div class="company-info">
                <div class="col-xs-6">
                    <table width="70%" align="center">
                        <tr><td class="border-title" align="center"><strong>Date in</strong></td></tr>
                        <tr><td class="border-content" align="center" height="20px"><p>{{ $bill_of_lading->date }}</p></td></tr>
                    </table>
                </div>
                <div class="col-xs-6">
                    {!! DNS2D::getBarcodeSVG(
                         $bill_of_lading->code
                        , "QRCODE", 2, 2) !!}
                </div>
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
        <table class="table resume-table">
            <tr>
                <td class="border-title" colspan="2" width="25%"><strong>IMPORTING CARRIER</strong></td>
                <td class="border-title" colspan="2" width="25%"><strong>FROM PORT OF/ ORIGIN AIRPORT</strong></td>
                <td class="border-title" colspan="2"><strong>OUR REFERENCE NUMBER</strong></td>
                <td class="border-title" width="12%"><strong>ARRIVAL DATE</strong></td>
                <td class="border-title" width="12%"><strong>FREE DATE EXP.</strong></td>
            </tr>
            <tr>
                <td colspan="2" height="30px" class="border-content">{{ $bill_of_lading->carrier_id > 0 ? strtoupper($bill_of_lading->carrier->name) : "" }}</td>
                <td colspan="2" class="border-content">{{ $bill_of_lading->port_loading_id > 0 ? strtoupper($bill_of_lading->port_loading_name->name) : "" }}</td>
                <td colspan="2" class="border-content">{{ strtoupper($bill_of_lading->our_reference) }}</td>
                <td class="border-content">{{ $bill_of_lading->arrival_date }}</td>
                <td class="border-content"></td>
            </tr>
            <tr><td colspan="8" class="border-title" align="center"><strong>LOCATION OF MERCHANDISE</strong></td></tr>
            <tr><td colspan="8" class="border-content" height="30px"></td></tr>
            <tr>
                <td width="10%" height="70px" align="center" class="border-content"><h5>DELIVER TO</h5></td>
                <td colspan="3" class="border-content">
                <td colspan="4" class="border-content">
                    THE CARRIER OR CARTMAN TO WHOM THIS ORDER IS ASSIGNED WILL BE<BR>
                    RESPONSIBLE FOR ANY STORAGE AND DEMURRAGE CHARGES RESULTING <BR>
                    FROM NEGLIGENCE.<BR><BR>
                    IMPORTANT: NOTIFY US AT ONCE IF DELIVERY CANNOT BE EFFECTED<BR>
                    AS INSTRUCTED.
                </td>
            </tr>
            <tr>
                <td colspan="3" class="border-title"><strong>BROKER/ IMPORTER NAME</strong></td>
                <td colspan="3" class="border-title"><strong>AUTHORIZED SIGNATURE</strong></td>
                <td colspan="2" class="border-title"><strong>FREIGHT CHARGES</strong></td>
            </tr>
            <tr>
                <td colspan="3" height="30px" class="border-content"></td>
                <td colspan="3" height="30px" class="border-content"></td>
                <td colspan="2" height="30px" class="border-content" style="font-size: 6px;">
                    <div class="col-xs-6" >{!! Form::bsLabel("", 'COD') !!}</div>
                    <div class="col-xs-6">{!! Form::bsLabel("", 'Prepaid') !!}</div>
                    <div class="col-xs-6">{!! Form::bsLabel("", 'Collect') !!}</div>
                    <div class="col-xs-6">{!! Form::bsLabel("", 'Bank release') !!}</div>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="border-title"><strong>TRUCKING COMPANY NAME</strong></td>
                <td colspan="2" class="border-title"><strong>DATE AND SIGNATURE OF RECEIVER</strong></td>
                <td class="border-title"><strong>NO. PKG REC D</strong></td>
            </tr>
            <tr>
                <td class="border-content" height="30px"  colspan="5"></td>
                <td class="border-content" height="30px"  colspan="2" rowspan="2"></td>
                <td class="border-content" height="30px"  rowspan="2"></td>
            </tr>
            <tr>
                <td colspan="5" class="border-content" style="font-size: 7px; height: 8px;" align="center">IS AUTHORIZED TO PICK UP THE MERCHANDISE INDICATED BELOW</td>
            </tr>
        </table>
    </div>
    <div class="row">
       <div class="table-content resume-table" style="height:280px; border-bottom: 1px solid;">
           <div class="table-row">
               <div class="cell-title adjust"><strong>MARKS AND NUMBERS</strong></div>
               <div class="cell-title adjust"><strong>ENTRY NUMBER</strong></div>
               <div class="cell-title adjust"><strong>PKGS BY ENTRY</strong></div>
               <div class="cell-title adjust"><strong>IMPORTING CARRIER & B/L OR A WH NO.</strong></div>
               <div class="cell-title adjust"><strong>DESCRIPTION OF GOOD & WT</strong></div>
           </div>
           @foreach($bill_of_lading->container as $detail)
               <div class="table-row">
                   <div class="cell adjust"><?php echo nl2br(strtoupper( $detail->container_number) . "\n". strtoupper($detail->seal_number)); ?></div>
                   <div class="cell adjust"></div>
                   <div class="cell adjust">0</div>
                   <div class="cell adjust">{{ strtoupper($bill_of_lading->bl_number) }}</div>
                   <div class="cell adjust">0.00 Kgs<br>0.00 Lbs</div>
               </div>
           @endforeach
           <div class="table-row">
               <div class="cell"></div>
               <div class="cell"></div>
               <div class="cell"></div>
               <div class="cell"></div>
               <div class="cell"></div>
           </div>
       </div>
    </div>
    <div class="row">
        <table class="resume-table">
            <tr>
                <td colspan="10" class="border-content"><strong>COMMENTS:</strong></td>
            </tr>
            <tr>
                <td colspan="10" class="border-content">
                    THE RECEIPT OF THS DELIVERY ORDER WILL SERVE AS A PRELIMINARY NOTICE OF INTENT TO FILE CLAIM AGAINST THE IMPORTING <BR>
                    CARRIER FOR ANY DAMAGE TO, AND / OR LOSS OF THE SHIPMENT WITH THE UNDERSTANDING THAT THE FINAL CLAIM WILL BE MADE <BR>
                    BY THE IMPORTER OR THEIR INSURANCE COMPANY.
                </td>
            </tr>
            <tr>
                <td width="15%"><strong>PACKAGE COUNT VALIDATION</strong></td>
                <td colspan="6" width="25%"></td>
                <td width="10%"><strong>DATE:</strong></td>
                <td width="15%" style="border-bottom: 1px solid;"></td>
                <td width="10%" rowspan="5">
                    <table class="table header-table" border="1">
                        <tr><td style="font-size: 6px;"><strong>NO. OF PKGS.</strong></td></tr>
                        <tr><td height="15px"></td></tr>
                        <tr><td height="15px"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="25%" colspan="2"><strong>AGENT OF DELIVERING</strong></td>
                <td colspan="3" style="border-bottom: 1px solid;"></td>
                <td width="1%"></td>
                <td colspan="3" width="35%" style="border-bottom: 1px solid;"></td>
            </tr>
            <tr>
                <td width="25%" colspan="2"></td>
                <td colspan="3" align="center" style="font-size: 6px;">(NAME)</td>
                <td width="1%"></td>
                <td colspan="3" align="center" style="font-size: 6px;">(TITLE)</td>
            </tr>
            <tr>
                <td colspan="2"><strong>DELIVERY QUANTITIES VERIFIED</strong></td>
                <td colspan="5" style="border-bottom: 1px solid;"></td>
                <td width="1%"></td>
                <td style="border-bottom: 1px solid;"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="5" align="center" style="font-size: 6px;">(SIGNATURE OF CUSTOMS OFFICER)</td>
                <td width="1%"></td>
                <td align="center" style="font-size: 6px;">BADGE NO.</td>
            </tr>
            <tr>
                <td colspan="3" class="border-title" width="30%"><strong>CUSTOMS PERMIT</strong></td>
                <td class="border-title" colspan="4" width="35%"><strong>PKG. NOS. HELD BY U.S. CUSTOMS TO FOLLOW</strong></td>
                <td class="border-title" colspan="3" ><strong>GO NUMBER</strong></td>
            </tr>
            <tr>
                <td colspan="3" class="border-content" height="30px" style="font-size: 6px;">
                    <div class="col-xs-6">{!! Form::bsLabel("", 'Attached') !!}</div>
                    <div class="col-xs-6">{!! Form::bsLabel("", 'Lodge with U.S. customs') !!}</div>
                </td>
                <td class="border-content" colspan="4"></td>
                <td class="border-content" colspan="3"></td>
            </tr>
            <tr>
                <td class="border-title" colspan="4"><strong>DOCUMENT ATTACHED</strong></td>
                <td class="border-title" colspan="2"><strong>DELIVERY CHARGES</strong></td>
                <td colspan="4" rowspan="2" class="border-content"></td>
            </tr>
            <tr>
                <td class="border-content" colspan="4" height="60px" style="font-size: 6px;">
                    <div class="col-xs-6">{!! Form::bsLabel("", 'Delivery order') !!}</div>
                    <div class="col-xs-6">{!! Form::bsLabel("", 'Delivery order') !!}</div>
                    <div class="col-xs-6">{!! Form::bsLabel("", 'B/L') !!}</div>

                </td>
                <td class="border-content" colspan="2" height="60px"></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <p align="center"><strong>DELIVERY CLARK: ALL DEMURRAGE FOR ACCOUNT OF DRAWEE OF THIS ORDER</strong></p>
    </div>
</div>
</body>

</html>
