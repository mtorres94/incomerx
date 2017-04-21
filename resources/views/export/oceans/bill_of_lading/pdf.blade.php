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
                <h5><strong>{{ ($type == 2 ? strtoupper($bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->name : "") : "VECO LOGISTICS MIAMI INC." ) }}</strong></h5>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="company-info" align="center">
                <h5><strong>{{ (($type == 1 || $type == 6 || $type == 7)? "ORIGINAL" : ($type == 4 || $type == 5 ? "NON- NEGOTIABLE" : "") ) }} </strong></h5>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="document-info pull-right">
                <strong>{{ ($type =='3' ?  "STRAIGHT BILL OF LADING / DOCK RECEIPT": "BILL OF LADING") }}</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table resume-table" >
            <tr>
                <td colspan="2" width="50%"  style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;">2. EXPORTER (Principal or seller-licensee and address including ZIP Code)</td>
                <td width="35%" style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;">5. DOCUMENT NUMBER</td>
                <td  style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;">5a. B/L NUMBER</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="3" width="50%" height="70px" style="border-right: 1px solid; border-left: 1px solid;">
                    <p>{{ $bill_of_lading->shipper_id > 0 ? strtoupper($bill_of_lading->shipper->name) : "" }}<br>
                    {{ strtoupper( $bill_of_lading->shipper_address) }}<br>
                    {{ strtoupper($bill_of_lading->shipper_city) }}</p>
                </td>
                <td  width="35%" style="border-right: 1px solid; border-left: 1px solid;">{{ $bill_of_lading->booking_code }}</td>
                <td style="border-right: 1px solid;" height="15px">{{ $bill_of_lading->code }}</td>
            </tr>
            <tr>
                <td style="font-size:7px; border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;" width="35%" >6. EXPORT REFERENCES</td>
                <td style="font-size:7px; border-right: 1px solid; border-bottom: 1px solid; border-top: 1px solid;">DATE<br>{{ $bill_of_lading->date }}</td>
            </tr>
            <tr style="border-right: 1px solid; ">
                <td width="35%" colspan="2" >FILE#: &nbsp;{{ $bill_of_lading->shipment_id > 0 ? $bill_of_lading->shipment->code : "" }}</td>
            </tr>
            <tr>
                <td colspan="2" width="50%" style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;">3. CONSIGNED TO</td>
                <td width="35%" style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;">7. FORWARDING AGENT (Name and address - references)</td>
                <td style="border-right: 1px solid; border-bottom: 1px solid;" height="20px" >{{ $bill_of_lading->fmc_number }}</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="3" width="50%" height="70px" style="border-right: 1px solid; border-left: 1px solid; ">
                    <p>{{ $bill_of_lading->consignee_id > 0 ? strtoupper($bill_of_lading->consignee->name) : "" }}<br>
                        {{ strtoupper( $bill_of_lading->consignee_address) }}<br>
                        {{ strtoupper($bill_of_lading->consignee_city) }}</p>
                </td>
                <td colspan="2" width="35%"  style="border-right: 1px solid; ">
                    <p>{{ $bill_of_lading->agent_id > 0 ? strtoupper($bill_of_lading->agent->name) : "" }}<br>
                        {{ strtoupper( $bill_of_lading->agent_address) }}<br>
                        {{ strtoupper($bill_of_lading->agent_city) }}</p>
                </td>
            </tr>
            <tr>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;" colspan="2">POINT (STATE) OF ORIGIN OR FTZ NUMBER</td>
            </tr>
            <tr >
                <td colspan="2" style=" border-right: 1px solid; height:15px;">{{ $bill_of_lading->origin_country_id >0 ? strtoupper($bill_of_lading->origin_country->name) : ""  }}</td>
            </tr>
            <tr>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;" colspan="2">4. NOTIFY PARTY / INTERMEDIATE CONSIGNEE (Name and address)</td>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;" colspan="2">9. DOMESTIC ROUTING / EXPORT INSTRUCTION</td>
            </tr>
            <tr>
                <td  colspan="2" height="80px" style="border-right: 1px solid; border-left: 1px solid;">
                    <p>{{ $bill_of_lading->notify_id > 0 ? strtoupper($bill_of_lading->notify->name) : "" }}<br>
                        {{ strtoupper( $bill_of_lading->notify_address) }}<br>
                        {{ strtoupper( $bill_of_lading->notify_city) }}<br>
                        Phone: &nbsp;{{ $bill_of_lading->notify_phone }}<br>
                        Fax: &nbsp;{{ $bill_of_lading->notify_fax}}</p>
                </td>
                <td  colspan="2" rowspan="3" style="border-right: 1px solid; border-left: 1px solid;">{{ $bill_of_lading->domestic_instruction }}</td>
            </tr>
            <tr>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;">12. PRE- CARRIAGE BY</td>
                <td style="font-size: 7px; border-top: 1px solid; border-right: 1px solid;">13. PLACE OF RECEIPT BY PRE-CARRIER</td>
            </tr>
            <tr>
                <td height="20px" style="font-size: 7px; border-right: 1px solid; border-left: 1px solid;" >{{ strtoupper($bill_of_lading->pre_carriage_by) }}</td>
                <td  style="border-right: 1px solid;">{{ strtoupper($bill_of_lading->place_receipt) }}</td>
            </tr>
            <tr>
                <td style="font-size: 7px; border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">14. EXPORTING CARRIER</td>
                <td style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">15. PORT OF LOADING / EXPORT</td>
                <td colspan="2" style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">10. LOADING PIER/TERMINAL</td>
            </tr>
            <tr>
                <td height="20px" style="border-right: 1px solid; border-left: 1px solid;">{{ strtoupper($bill_of_lading->exporting_carrier) }}</td>
                <td style="border-right: 1px solid;">{{ strtoupper($bill_of_lading->port_loading) }}</td>
                <td colspan="2" style="border-right: 1px solid;">{{ strtoupper($bill_of_lading->loading_terminal )}}</td>
            </tr>
            <tr>
                <td style="font-size: 7px; border-right: 1px solid; border-left: 1px solid; border-top: 1px solid;">16. FOREIGN PORT OF UNLOADING</td>
                <td style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">17. PLACE OF DELIVERY BY PRE-CARRIER</td>
                <td style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">11. TYPE OF MOVE</td>
                <td style="font-size: 7px; border-right: 1px solid; border-top: 1px solid;">PREPAID/COLLECT</td>

            </tr>
            <tr>
                <td height="20px" style="border-left: 1px solid; border-right: 1px solid;">{{ strtoupper($bill_of_lading->foreign_port) }}</td>
                <td style="border-right: 1px solid;">{{ strtoupper($bill_of_lading->place_delivery) }}</td>
                <td style="border-right: 1px solid;">OCEAN</td>
                <td style="border-right: 1px solid;">{{ $bill_of_lading->bl_type == 'C' ? 'COLLECT' : 'PREPAID' }}</td>
            </tr>
        </table>
    </div>
    <div style="height:300px; margin-top:-5px; font-size:8px;" class="row header-table">
        <div class="table-content">
            <!-- CARGO DETAILS-->
            <div class="table-row">
                <div class="cell-title adjust" align="center">MARKS AND NUMBERS<br>(18)</div>
                <div class="cell-title adjust" align="center">NUMBER <br>OF PACKAGES<br>(19)</div>
                <div class="cell-title adjust" align="center">DESCRIPTION OF COMMODITIES <i>in Schedule B detail</i><br>(20)</div>
                <div class="cell-title adjust" align="center">GROSS WEIGHT<br><i>(kilos)</i><br>(21)</div>
                <div class="cell-title adjust" align="center">MEASUREMENT<br><br>(22)</div>
            </div>

            @foreach($bill_of_lading->cargo as $detail)
                <div class="table-row">
                    <div class="cell adjust">
                        <?php echo nl2br(str_replace("-", "\n", strtoupper($detail->cargo_marks))); ?>
                    </div>
                    <div align="right" class="cell adjust">{{ $detail->cargo_pieces }}</div>
                    <div align="left" class="cell adjust">
                        @if($bill_of_lading->bl_class == 3)
                            <?php echo nl2br(str_replace(",", "\n", strtoupper($detail->cargo_description))); ?>
                        @else
                            @for ($x =0; $x < count($result); $x++)
                                <?php  echo nl2br($result[$x]['warehouse_code']." ". $result[$x]['detail']."\n"); ?>
                            @endfor
                        @endif
                    </div>
                    <div class="cell adjust" align="right">
                        {{ $detail->cargo_weight_k}} &nbsp; Kgs<br>{{ $detail->cargo_gross_weight}}&nbsp;Lbs
                    </div>
                    <div class="cell adjust" align="right">
                        {{ $detail->cargo_cubic_k}} &nbsp; Cbm<br>{{ $detail->cargo_cubic }}&nbsp;Cft
                    </div>
                </div>
            @endforeach
            <!--CARGO TOTALS -->
            <div class="table-row">
                <div align="right" class="cell adjust"><strong>TOTALS:</strong></div>
                <div align="right" class="cell adjust" style="border-top: 1px solid;"><strong>{{ $bill_of_lading->total_pieces }}</strong></div>
                <div class="cell adjust"></div>
                <div align="right" class="cell adjust" style="border-top: 1px solid;"><strong>{{ $bill_of_lading->total_weight_kgs}} &nbsp;Kgs<br>{{ $bill_of_lading->total_gross_weight }} &nbsp;Lbs</strong></div>
                <div align="right" style="border-top: 1px solid;" class="cell adjust"><strong>{{ $bill_of_lading->total_cubic_cbm }}&nbsp;Cbm <br> {{ $bill_of_lading->total_cubic }} &nbsp;Cft</strong></div>
            </div>
            <div class="table-row">
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell"><strong><?php echo strtoupper(nl2br(str_replace(",", "\n", $bill_of_lading->bl_notes)));?> </strong></div>
                <div class="cell"></div>
                <div class="cell"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table resume-table">
            <tr>
                <td colspan="3" style="font-size:7px; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">
                    Carrier has a policy payment, solicitation, or receipt of any rebate, directly or indirectly, which would be unlawful under the United State Shipping Act: 1984 as amended<br>
                </td>
            </tr>
            <tr>
                <td style="font-size:7px; border-bottom: 1px solid; border-left: 1px solid;">DECLARED VALUE</td>
                <td style="font-size:7px; border-bottom: 1px solid;">{{ $bill_of_lading->declared_value }}</td>
                <td style="font-size:7px; border-bottom: 1px solid; border-right: 1px solid;">
                    READ CLAUSE 29 HEREOF CONCERNING EXTRA FREIGHT AND CARRIER'S LIMITATIONS OF LIABILITY
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <table class="table header-table">
            <tr>
                <td width="50%" valign="top">
                  <!-- Prepaid and Collected -->
                    <div class="row resume-table">
                        <div class="col-xs-12"><p align="center"><strong>FREIGHT RATES, CHARGES, WEIGHT AND / OR MESURAMENTS</strong></p></div>
                    </div>
                    <div class="table-container">
                        <div class="table-content">
                           <div class="table-row">
                               <div class="cell-title adjust" align="center">
                                   <strong>SUBJECT TO CORRECTION</strong>
                               </div>
                               <div class="cell-title adjust" align="center">
                                   <strong>PREPAID</strong>
                               </div>
                               <div class="cell-title adjust" align="center">
                                   <strong>COLLECTED</strong>
                               </div>
                           </div>
                            <?php
                            $sum_prepaid = 0;
                            $sum_collected = 0;
                            ?>

                            @foreach($bill_of_lading->charge as $detail)
                                @if($type == '7')
                                    <div class="table-row">
                                        <div class="cell adjust" align="center" style="height:150px; vertical-align: middle;"><strong>AS AGREED</strong></div>
                                        <div class="cell adjust"></div>
                                        <div class="cell adjust"></div>
                                    </div>
                                    @break
                                @else
                                    <div class="table-row">
                                        <div class="cell adjust">
                                            {{ ($type == "5" || $type == "6") ? ($detail->billing_id == "77" ? strtoupper($detail->billing->name) : ""): $detail->billing_id > 0 ? strtoupper($detail->billing->name): ""}}
                                        </div>
                                        <div class="cell adjust">
                                            @if($detail->bill_type == 'P')
                                                @if($type != '2')
                                                    @if($type == '5' || $type == '6')
                                                        @if($detail->billing_id == '77')
                                                            {{ $detail->billing_amount }}
                                                            <?php $sum_prepaid+= $detail->billing_amount; ?>
                                                        @endif
                                                    @else
                                                        {{ $detail->billing_amount }}
                                                        <?php $sum_prepaid+= $detail->billing_amount; ?>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                        <div class="cell adjust">
                                            @if($detail->bill_type == 'C')
                                                @if($type != '2')
                                                    @if($type == '5' || $type == '6')
                                                        @if($detail->billing_id == '77')
                                                            {{ $detail->billing_amount }}
                                                            <?php $sum_collected+= $detail->billing_amount; ?>
                                                        @endif
                                                    @else
                                                        {{ $detail->billing_amount }}
                                                        <?php $sum_collected+= $detail->billing_amount; ?>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="table-row">
                                <div class="cell"></div>
                                <div class="cell"></div>
                                <div class="cell"></div>
                            </div>
                            <div class="table-row">
                                <div class="cell-title adjust" align="center"><strong>GRAND TOTAL</strong></div>
                                <div class="cell-title adjust">{!! $type== '2' ? "": round($sum_prepaid, 3) !!}</div>
                                <div class="cell-title adjust">{!! $type == '2' ? "" : round($sum_collected, 3) !!}</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td width="50%" style="border-left:1px solid;">
                    <table class="table resume-table">
                        <tr>
                            <td colspan="5" style="font-size: 7px;">
                                <br>RECEIVED, by the Carrier as described on the reverse hereof (hereinafter called the Carrier)<br>
                                from the above named shipper, the goods, or packages said to contain goods, hereinabove<br>
                                described, in apparent good order and condition unless otherwise noted hereon, to be held<br>
                                and transported subject to all written, typed, printed or stamped provisions of this bill of<br>
                                lading, on this and on the reverse side hereof, to the port or place of discharge named above<br>
                                or so near thereunto as the ship can always safely get and leave always afloat at all stages<br>
                                and conditions of water and weather and there to be delivered or transshipped on payment of<br>
                                the charges hereon.<br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" height="15px" width="30%" style="font-size: 7px;">DATED AT: &nbsp;  &nbsp;</td>
                            <td colspan="2" style="border-bottom: 1px solid;">{{ $bill_of_lading->date }}</td>
                            <td width="40%" style="border-bottom: 1px solid; font-size:12px;"><strong>{{ ($type == '1' || $type == '6' || $type == '7') ? 'ORIGINAL' : (($type == '4' || $type == '5')? "NON-NEGOTIABLE": "")}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" height="20px"></td>
                        </tr>
                        <tr>
                            <td colspan="5" height="15px" style="font-size: 7px;">SIGNED ON BEHALF OF CARRIER</td>
                        </tr>
                        <tr>
                            <td height="15px" width="15%" style="font-size: 7px;">By: &nbsp;  &nbsp;</td>
                            <td colspan="4" style="border-bottom: 1px solid; font-size:12px;"><strong>{{ ($type == '2')  ? "": 'VECO LOGISTICS MIAMI' }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" height="20px"></td>
                        </tr>
                        <tr>
                            <td colspan="3" ></td>
                            <td colspan="2" width="70%" style="font-size:7px; border-top: 1px solid; border-left: 1px solid;" >BL/No.</td>
                        </tr>
                        <tr>
                            <td colspan="3" height="15px"></td>
                            <td colspan="2" align="right" style="border-left:1px solid;">{{ $bill_of_lading->code }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>



</div>


</body>

</html>