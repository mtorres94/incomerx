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
            </div>
        </div>
        <div class="col-xs-6">
            <div class="document-info pull-right">
                <h5><strong>BILL OF LADING</strong></h5>
            </div>
        </div>
    </div>
    <div class="row">

    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table bl-table" border="1" width="100%" >
                <tr>
                    <td colspan="2" rowspan="2" width="50%" valign="top">
                            <p class="p-title">2. EXPORTER (Principal or seller license and address including Zip Code)</p>
                            <p >{{ strtoupper(($bill_of_lading->shipper_id > 0 ) ? $bill_of_lading->shipper->name : "") }}<br>
                            {{ strtoupper($bill_of_lading->shipper_address) }}<br>
                            {{ strtoupper($bill_of_lading->shipper_state_id > 0 ? $bill_of_lading->shipper_state->name : "")}} {{ strtoupper($bill_of_lading->shipper_zip_code_id > 0 ? " , ".$bill_of_lading->shipper_zip_code->code : "") }} </p>
                    </td>
                    <td valign="top"  width="35%">
                        <p class="p-title">5. DOCUMENT NUMBER</p>
                        {{ $bill_of_lading->shipment->booking_code }}
                    </td>
                    <td valign="top"  width="15%">
                            <p class="p-title">5a. BL NUMBER</p>
                            {{ $bill_of_lading->bl_number }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class="table header-table">
                            <tr>
                                <td width="70%"><p class="p-title ">6. EXPORT REFERENCES</p></td>
                                <td width="30%" valign="top" class="date">
                                    <p class="p-title">DATE</p>
                                    {{ $bill_of_lading->bl_date }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">FILE# {{ ($bill_of_lading->shipment_id > 0 ? $bill_of_lading->shipment->code : "") }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2" valign="top">
                            <p class="p-title">3. CONSIGNED TO</p>
                            <p>{{ strtoupper($bill_of_lading->consignee_id  >0 ? $bill_of_lading->consignee->name: "") }}<br>
                            {{ strtoupper($bill_of_lading->consignee_id  >0 ? $bill_of_lading->consignee->address: "") }}<br>
                            {{ strtoupper($bill_of_lading->consignee_state_id  >0 ? $bill_of_lading->consignee_state->name: "") }}<br></p>
                    </td>
                    <td colspan="2" valign="top">
                        <table class="table">
                            <tr>
                                <td width="70%">
                                    <p class="p-title ">7. FORWARDING AGENT (Name and address - references)</p>
                                </td>
                                <td class="date" width="30%">{{ $bill_of_lading->fmc_number }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>{{ strtoupper($bill_of_lading->shipment->forwarding_agent_id >0 ? $bill_of_lading->shipment->forwarding_agent->name : "") }} <br>
                                        {{ strtoupper($bill_of_lading->shipment->forwarding_agent_id >0 ? $bill_of_lading->shipment->forwarding_agent->address: "") }} <br>
                                        {{ strtoupper($bill_of_lading->shipment->forwarding_agent_id >0 ? $bill_of_lading->shipment->forwarding_agent->phone : "") }}</p>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">
                        <p class="p-title">8. POINT STATE OF ORIGIN OR FTZ NUMBER</p>
                        <p>{{ strtoupper($bill_of_lading->point_of_origin) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top" >
                        <p class="p-title">4. NOTIFY PARTY/ INTERMEDIATE CONSIGNEE (Name and Address)</p>
                        <p>{{ strtoupper($bill_of_lading->notify_id >0 ? $bill_of_lading->notify->name : "" ) }}<br>
                            {{ strtoupper($bill_of_lading->notify_id >0 ? $bill_of_lading->notify->address : "" ) }}<br>
                            {{ strtoupper($bill_of_lading->notify_state_id >0 ? $bill_of_lading->notify_state->name : "" ) }}<br>
                            {{ "CONTACT: ".strtoupper($bill_of_lading->notify_contact)}} <br>
                            {{"  PHONE:". strtoupper($bill_of_lading->notify_contact_phone)  }}</p>

                    </td>
                    <td colspan="2" rowspan="2" valign="top">
                        <p class="p-title">9. DOMESTIC ROUTING/EXPORT INSTRUCTIONS</p>
                        <p>{{ strtoupper($bill_of_lading->shipment->domestic_routing) }}</p>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <p class="p-title">12. PRE CARRIAGE BY</p>
                        <p>{{ strtoupper($bill_of_lading->pre_carriage_by) }}</p>
                    </td>
                    <td valign="top">
                            <p class="p-title">13. PLACE OF RECEIPT BY PRE-CARRIER</p>
                            <p>{{ strtoupper($bill_of_lading->shipment->place_receipt->name) }}</p>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <p class="p-title">14. EXPORTING CARRIER</p>
                        <p>{{ strtoupper($bill_of_lading->exporting_carrier) }}</p>
                    </td>
                    <td valign="top">
                        <p class="p-title">13. PORT OF LOADING/EXPORT</p>
                        <p>{{ strtoupper($bill_of_lading->shipment->port_loading->name) }}</p>
                    </td>
                    <td colspan="2" valign="top">
                            <p class="p-title">10. LOADING PIER/TERMINAL</p>
                            <p>{{ strtoupper($bill_of_lading->loading_terminal) }}</p>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                            <p class="p-title">16. FOREIGN PORT OF UNLOADING</p>
                            <p>{{ strtoupper($bill_of_lading->shipment->port_unloading->name) }}</p>
                    </td>
                    <td valign="top">
                            <p class="p-title">17. PLACE OF DELIVERY BY PRE-CARRIER</p>
                            <p>{{ strtoupper($bill_of_lading->shipment->place_delivery->name) }}</p>
                    </td>
                    <td valign="top">
                            <p class="p-title">11. TYPE OF MOVE</p>
                            <p>OCEAN</p>
                    </td>
                    <td valign="top" width="15%">
                            <p class="p-title">PREPAID/ COLLECTED</p>
                            <p>{{ ($bill_of_lading->bl_type == "P"? "PREPAID" : "COLLECTED") }}</p>
                    </td>
                </tr>
            </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-condensed table-bordered">
                <tbody>
                <tr>
                    <td align="center" width="15%">MARKS AND NUMBERS<br> (18)</td>
                    <td align="center" width="10%">NUMBER OF PACKAGES <br>(19)</td>
                    <td align="center" width="40%">DESCRIPTION OF COMMODITY <i>In Schedule B detail</i> <br>(20)</td>
                    <td align="center" width="15%">GROSS WEIGHT<br><i>(Kilos) </i><br>(21)</td>
                    <td align="center" width="10%">MEASURAMENT <br>(22)</td>
                </tr>
                @foreach( $bill_of_lading->cargo as $detail)
                    <tr>
                        <td>{{ strtoupper($detail->cargo_marks) }}</td>
                        <td>{{ $detail->cargo_pieces }}</td>
                        <td>{{ strtoupper($detail->cargo_description) }}</td>
                        <td>
                            <p>{{ ($detail->cargo_weight_k >0 ? $detail->cargo_weight_k : 0) }} Kgs</p>
                            <p>{{ ($detail->cargo_weight_l >0 ? $detail->cargo_weight_l : 0) }} Lbs</p>
                        </td>
                        <td>
                            <p>{{ ($detail->cargo_cubic_k >0 ? $detail->cargo_cubic_k  : 0) }} Cbm</p>
                            <p>{{ ($detail->cargo_cubic_l >0 ? $detail->cargo_cubic_l  : 0) }} Cft</p>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td><strong>TOTALS: </strong></td>
                    <td><strong>{{ round($bill_of_lading->total_pieces) }}</strong></td>
                    <td></td>
                    <td><strong>{{ $bill_of_lading->total_weight_kgs}} Kgs<br>{{ $bill_of_lading->total_weight_lbs }} Lbs</strong></td>
                    <td><strong>{{ $bill_of_lading->total_cubic_cbm }} Cbm<br>{{ $bill_of_lading->total_cubic_cft }} Cft</strong></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <p class="p-title">Carrier has a policy payment, solicitation, or receipt of any rebate, directly or indirectly, which would be unlawful under the United State Shipping Act: 1984 as amended.</p>
                        <p class="p-title">DECLARED VALUE {{ $bill_of_lading->declared_value }} READ CLAUSE 29 HEREOF CONCERNING EXTRA FREIGHT AND CARRIER'S LIMITATIONS OF LIABILITY.</p>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>


    <div class="row">
        <div class="col-xs-6">
            <div class="center">
                <table class="table header-table">
                    <tr><td  align="center"><strong>FREIGHT RATES, CHARGES, WEIGHT AND / OR MEASURAMENTS</strong></td></tr>
                </table>
            </div>
                <table class="table resume-table table-bordered">
                    <tbody>
                    <tr>
                        <td align ="center"><p class="p-title"><strong>SUBJECT TO CORRECTION</strong></p></td>
                        <td align ="center"><p class="p-title"><strong>PREPAID</strong></p></td>
                        <td align ="center"><p class="p-title"><strong>COLLECT</strong></p></td>
                    </tr>
                    @foreach($bill_of_lading->charge as $detail)
                    <tr>
                        <td>{{ strtoupper($detail->billing_id > 0 ? $detail->billing->name : "") }}</td>
                        <td>{{ ($detail->bill_type == "P" ? $detail->billing_amount : "") }}</td>
                        <td>{{ ($detail->bill_type == "C" ? $detail->billing_amount : "") }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><strong>TOTALS</strong></td>
                        <td>{!! $bill_of_lading->sum_prepaid !!}</td>
                        <td>{!! $bill_of_lading->sum_collected !!}</td>
                    </tr>
                    </tbody>
                </table>
        </div>
        <div class="col-xs-6">
            <table class="table header-table">
                <tr>
                    <td colspan="3">
                        <p class="p-title">
                            RECEIVED, by the Carrier as described on the reverse hereof (hereinafter called the Carrier)
                            from the above named shipper, the goods, or packages said to contain goods, here in above
                            described, in apparent good order and condition unless otherwise noted hereon, to be held
                            and transported subject to all written, typed, printed or stamped provisions of this bill of
                            lading, on this and on the reverse side hereof, to the port or place of discharge named above
                            or so near thereunto as the ship can always safely get and leave always afloat at all stages
                            and conditions of water and weather and there to be delivered or transshipped on payment of
                            the charges hereon.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><p>DATED AT: </p></td>
                    <td valign="bottom" class="line-text"><p>{{ $bill_of_lading->bl_date }}</p></td>
                    <td><p><strong>{{ ($bill_of_lading->bl_status == 'O' ?  "ORIGINAL" : ($bill_of_lading->bl_status == "E" ? "EXPRESS RELEASED" : "OBL RECEIVED_DATE")) }}</strong></p></td>
                </tr>
                <tr>
                    <td colspan="2"><p>SIGNED ON BEHALF OF CARRIER: </p></td>
                </tr>
                <tr>
                    <td ><p><strong>BY:  </strong></p> </td>
                    <td colspan="2" class="line-text"><h5><strong>{{ ($type == '1'? $bill_of_lading->shipper->name : ($type == '2' ? $bill_of_lading->carrier->name : "")) }} </strong></h5></td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="bl-number"><p><strong>BL. NO: </strong> {{ strtoupper($bill_of_lading->code) }}</p></td>
                </tr>
            </table>
        </div>

    </div>
</div>


</body>

</html>