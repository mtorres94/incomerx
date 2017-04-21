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
    <style type="text/css">
        .page {
            overflow: hidden;
            page-break-after: always;
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row row-padding">
        <div class="col-xs-4">
            <div class="company-info">
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
            </div>
        </div>
        <div class="col-xs-8">
            <div class="document-info pull-right">
                <strong>STRAIGHT BILL OF LADING / DOCK RECEIPT</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table resume-table" >
            <tr>
                <td colspan="3" width="50%"  style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;">2. EXPORTER (Principal or seller-licensee and address including ZIP Code)</td>
                <td colspan="2" width="35%" style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;">5. DOCUMENT NUMBER</td>
                <td  style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;">5a. B/L NUMBER</td>
            </tr>
            <tr>
                <td colspan="3" rowspan="3" width="50%" height="70px" style="border-right: 1px solid; border-left: 1px solid;">
                    <p>{{ $bill_of_lading->shipper_id > 0 ? strtoupper($bill_of_lading->shipper->name) : "" }}<br>
                        {{ strtoupper( $bill_of_lading->shipper_address) }}<br>
                        {{ strtoupper($bill_of_lading->shipper_city) }}</p>
                </td>
                <td colspan="2" width="35%" style="border-right: 1px solid; border-left: 1px solid;">{{ $bill_of_lading->booking_code }}</td>
                <td style="border-right: 1px solid;" height="15px">{{ $bill_of_lading->code }}</td>
            </tr>
            <tr>
                <td style="font-size:7px; border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;" width="35%" colspan="2">6. EXPORT REFERENCES</td>
                <td style="font-size:7px; border-right: 1px solid; border-bottom: 1px solid; border-top: 1px solid;">DATE<br>{{ $bill_of_lading->date }}</td>
            </tr>
            <tr style="border-right: 1px solid; ">
                <td width="35%" colspan="3" >FILE#: &nbsp;{{ $bill_of_lading->shipment_id > 0 ? $bill_of_lading->shipment->code : "" }}</td>
            </tr>
            <tr>
                <td colspan="3" width="50%" style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;">3. CONSIGNED TO</td>
                <td colspan="2" width="35%" style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;">7. FORWARDING AGENT (Name and address - references)</td>
                <td style="border-right: 1px solid; border-bottom: 1px solid;" height="20px" >{{ $bill_of_lading->fmc_number }}</td>
            </tr>
            <tr>
                <td colspan="3" rowspan="3" width="50%" height="70px" style="border-right: 1px solid; border-left: 1px solid; ">
                    <p>{{ $bill_of_lading->consignee_id > 0 ? strtoupper($bill_of_lading->consignee->name) : "" }}<br>
                        {{ strtoupper( $bill_of_lading->consignee_address) }}<br>
                        {{ strtoupper($bill_of_lading->consignee_city) }}</p>
                </td>
                <td colspan="3" width="35%"  style="border-right: 1px solid; ">
                    <p>{{ $bill_of_lading->agent_id > 0 ? strtoupper($bill_of_lading->agent->name) : "" }}<br>
                        {{ strtoupper( $bill_of_lading->agent_address) }}<br>
                        {{ strtoupper($bill_of_lading->agent_city) }}</p>
                </td>
            </tr>
            <tr>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;" colspan="3">POINT (STATE) OF ORIGIN OR FTZ NUMBER</td>
            </tr>
            <tr >
                <td colspan="3" style="height:15px; border-right: 1px solid; ">{{ $bill_of_lading->origin_country_id >0 ? strtoupper($bill_of_lading->origin_country->name) : ""  }}</td>
            </tr>
            <tr>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;" colspan="3">4. NOTIFY PARTY / INTERMEDIATE CONSIGNEE (Name and address)</td>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;" colspan="3">9. DOMESTIC ROUTING / EXPORT INSTRUCTION</td>
            </tr>
            <tr>
                <td  colspan="3" height="80px" style="border-right: 1px solid; border-left: 1px solid;">
                    <p>{{ $bill_of_lading->notify_id > 0 ? strtoupper($bill_of_lading->notify->name) : "" }}<br>
                        {{ strtoupper( $bill_of_lading->notify_address) }}<br>
                        {{ strtoupper( $bill_of_lading->notify_city) }}<br>
                        Phone: &nbsp;{{ $bill_of_lading->notify_phone }}<br>
                        Fax: &nbsp;{{ $bill_of_lading->notify_fax}}</p>
                </td>
                <td  colspan="3" rowspan="3" style="border-right: 1px solid; border-left: 1px solid;">{{ $bill_of_lading->domestic_instruction }}</td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;">12. PRE- CARRIAGE BY</td>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;">13. PLACE OF RECEIPT BY PRE-CARRIER</td>
            </tr>
            <tr>
                <td colspan="2" height="20px" style="font-size: 7px; border-right: 1px solid; border-left: 1px solid;" >{{ strtoupper($bill_of_lading->pre_carriage_by) }}</td>
                <td  style="border-right: 1px solid;">{{ strtoupper($bill_of_lading->place_receipt) }}</td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 7px; border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">14. EXPORTING CARRIER</td>
                <td style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">15. PORT OF LOADING / EXPORT</td>
                <td colspan="3" style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">10. LOADING PIER/TERMINAL</td>
            </tr>
            <tr>
                <td colspan="2" height="20px" style="border-right: 1px solid; border-left: 1px solid;">{{ strtoupper($bill_of_lading->exporting_carrier) }}</td>
                <td style="border-right: 1px solid;">{{ strtoupper($bill_of_lading->port_loading) }}</td>
                <td colspan="3" style="border-right: 1px solid;">{{ strtoupper($bill_of_lading->loading_terminal )}}</td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 7px; border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">16. FOREIGN PORT OF UNLOADING</td>
                <td style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">17. PLACE OF DELIVERY BY PRE-CARRIER</td>
                <td colspan="2" style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">11. TYPE OF MOVE</td>
                <td style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">PREPAID/COLLECT</td>

            </tr>
            <tr>
                <td colspan="2" height="20px" style="border-left: 1px solid; border-right: 1px solid;">{{ strtoupper($bill_of_lading->foreign_port) }}</td>
                <td style="border-right: 1px solid;">{{ strtoupper($bill_of_lading->place_delivery) }}</td>
                <td colspan="2" style="border-right: 1px solid;">OCEAN</td>
                <td style="border-right: 1px solid;">{{ $bill_of_lading->bl_type == 'C' ? 'COLLECT' : 'PREPAID' }}</td>
            </tr>
            <tr>
                <td width="15%" style="font-size: 7px; border-top: 1px solid; border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid;" align="center">MARKS AND NUMBERS<br>(18)</td>
                <td width="10%" align="center" style="font-size: 7px;border-bottom: 1px solid;  border-top: 1px solid; border-right: 1px solid;">NUMBER <br>OF PACKAGES<br>(19)</td>
                <td colspan="2" align="center" width="45%" style="border-bottom: 1px solid;  font-size: 7px; border-top: 1px solid; border-right: 1px solid;">DESCRIPTION OF COMMODITIES <i>in Schedule B detail</i><br>(20)</td>
                <td width="15%" align="center" style="border-bottom: 1px solid;  font-size: 7px; border-top: 1px solid; border-right: 1px solid;"> GROSS WEIGHT<br><i>(kilos)</i><br>(21)</td>
                <td width="15%" align="center" style="border-bottom: 1px solid;  font-size: 7px; border-top: 1px solid; border-right: 1px solid;">MEASUREMENT<br><br>(22)</td>
            </tr>

            @foreach($bill_of_lading->cargo as $detail)
                <tr>
                    <td width="15%" align="center" height="100px" style="border-left: 1px solid; border-right: 1px solid;">
                        <?php echo nl2br(str_replace("-", "\n", strtoupper($detail->cargo_marks))); ?>
                    </td>
                    <td width="10%" align="right" style="border-right: 1px solid;">{{ $detail->cargo_pieces }}</td>

                    <td colspan="2" width="45%" align="left" style="border-right: 1px solid;">
                        @if($bill_of_lading->bl_class == 3)
                            <?php echo nl2br(str_replace(",", "\n", strtoupper($detail->cargo_description))); ?>
                        @else
                            @for ($x =0; $x < count($result); $x++)
                                <?php  echo nl2br($result[$x]['warehouse_code']." ". $result[$x]['detail']."\n"); ?>
                            @endfor
                        @endif
                    </td>
                    <td width="15%" align="right" style="border-right: 1px solid; border-top: 1px solid;">
                        {{ $detail->cargo_weight_k}} &nbsp; Kgs<br>{{ $detail->cargo_gross_weight}}&nbsp;Lbs
                    </td>
                    <td width="15%" align="right" style="border-right: 1px solid;">
                        {{ $detail->cargo_cubic_k}} &nbsp; Cbm<br>{{ $detail->cargo_cubic }}&nbsp;Cft
                    </td>
                </tr>
            @endforeach



            <tr>
                <td align="right" style="border-right: 1px solid; border-left: 1px solid;"><strong>TOTALS:</strong></td>
                <td align="right" style="border-right: 1px solid; border-top: 1px solid;"><strong>{{ $bill_of_lading->total_pieces }}</strong></td>
                <td colspan="2" style="border-right: 1px solid;"></td>
                <td align="right" style="border-right: 1px solid; border-top: 1px solid;"><strong>{{ $bill_of_lading->total_weight_kgs}} &nbsp;Kgs<br>{{ $bill_of_lading->total_gross_weight}} &nbsp;Lbs</strong></td>
                <td align="right" style="border-top: 1px solid; border-right: 1px solid;"><strong>{{ $bill_of_lading->total_cubic_cbm }}&nbsp;Cbm <br> {{ $bill_of_lading->total_cubic}} &nbsp;Cft</strong></td>
            </tr>
            <tr>
                <td height="125px" style="border-right: 1px solid; border-left: 1px solid;"></td>
                <td style="border-right: 1px solid;"></td>
                <td colspan="2" style="border-right: 1px solid;">
                    <table class="table header-table">
                        <tr>
                            <td width="30%">Number of Pieces:</td>
                            <td  width="70%" style="border-bottom: 1px solid;"></td>
                        </tr>
                        <tr>
                            <td>Container Number:</td>
                            <td style="border-bottom: 1px solid;"></td>
                        </tr>
                        <tr>
                            <td>Seal Number:</td>
                            <td style="border-bottom: 1px solid;"></td>
                        </tr>
                        <tr>
                            <td>Weight:</td>
                            <td style="border-bottom: 1px solid;"></td>
                        </tr>
                    </table>
                </td>
                <td style="border-right: 1px solid;"></td>
                <td style="border-right: 1px solid;"></td>
            </tr>
            <tr>
                <td colspan="6" style="font-size:7px; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">
                    Carrier has a policy payment, solicitation, or receipt of any rebate, directly or indirectly, which would be unlawful under the United State Shipping Act: 1984 as amended<br>
                </td>
            </tr>
            <tr>
                <td style="font-size:7px; border-bottom: 1px solid; border-left: 1px solid;">DECLARED VALUE</td>
                <td style="font-size:7px; border-bottom: 1px solid;"></td>
                <td colspan="4" style="font-size:7px; border-bottom: 1px solid; border-right: 1px solid;">
                    READ CLAUSE 29 HEREOF CONCERNING EXTRA FREIGHT AND CARRIER'S LIMITATIONS OF LIABILITY
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="row">
        <table class="table resume-table" >
            <tr>
                <td width="50%" valign="top">
                    <table class="table resume-table" style="height:100px;" width="90%">
                        <tr>
                            <td height="15px" colspan="3">DELIVERED BY: </td>
                        </tr>
                        <tr>
                            <td height="15px"></td>
                        </tr>
                        <tr>
                            <td width="15%">TRUCK</td>
                            <td width="85%" colspan="3" style="border-bottom: 1px solid; "></td>
                        </tr>
                        <tr>
                            <td height="15px"></td>
                        </tr>
                        <tr>
                            <td width="15%">ARRIVED:</td>
                            <td width="15%">DATE:</td>
                            <td width="25%" style="border-bottom: 1px solid; "></td>
                        </tr>
                        <tr>
                            <td height="15px"></td>
                        </tr>
                        <tr>
                            <td width="15%">LOADED:</td>
                            <td width="15%">DATE:</td>
                            <td width="25%" style="border-bottom: 1px solid;"></td>
                        </tr>
                        <tr>
                            <td height="15px"></td>
                        </tr>
                        <tr>
                            <td width="15%">PLACED:</td>
                            <td width="15%">IN SHIP:</td>
                            <td width="25%">LOCATION:</td>
                            <td width="25%" style="border-bottom: 1px solid;"></td>
                        </tr>
                        <tr>
                            <td height="15px"></td>
                        </tr>
                        <tr>
                            <td width="30%"></td>
                            <td width="25%">ON DOCK</td>
                        </tr>
                    </table>
                </td>
                <td width="50%" style="border-left:1px solid;">
                    <table class="table resume-table">
                        <tr>
                            <td colspan="2" style="font-size: 8px;">
                                <br> RECEIVED THE ABOVE DESCRIBED GOODS OR PACKAGES<br>
                                SUBJECT TO ALL THE TERMS OF THE UNDERSIGNED'S REGULAR<br>
                                FORM OF DOCK RECEIPT AND ALL BILL OF LADING WHICH SHALL<br>
                                CONSTITUTE THE CONTRACT UNDER WHICH THE GOODS ARE<br>
                                RECEIVED, COPIES OF WHICH ARE AVAILABLE FROM THE<br>
                                CARRIERE ON REQUEST AND MAYBE INSPECTED BY ANY OF ITS<br>
                                OFFICES.<br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" height="15px"></td>
                        </tr>
                        <tr>
                            <td width="15%" >By: &nbsp;  &nbsp;</td>
                            <td  width="85%" style="border-bottom: 1px solid;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td  height="20px">RECEIVING CLERK</td>
                        </tr>
                        <tr>
                            <td colspan="2" height="15px"></td>
                        </tr>
                        <tr>
                            <td width="15%" >DATE</td>
                            <td width="85%" align="right" style="border-bottom: 1px solid;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>



</div>


</body>

</html>