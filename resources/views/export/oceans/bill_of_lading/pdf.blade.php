<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bill of Lading {{ $bill_of_lading->code }}</title>
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
            <div class="row">
                <div class="document-info pull-right">
                    <h5><strong>BILL OF LADING</strong></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="tabla resume-table" border="1"  >
                <tr>
                    <td colspan="2" rowspan="2" width="50%" valign="top">
                            <p><strong>2. EXPORTER (Principal or seller license and address including Zip Code)</strong><br>
                            {{ strtoupper(($bill_of_lading->shipper_id > 0 ) ? $bill_of_lading->shipper->name : "") }}<br>
                            {{ strtoupper($bill_of_lading->shipper_address) }}<br>
                            {{ strtoupper($bill_of_lading->shipper_state_id > 0 ? $bill_of_lading->shipper_state->name : "")." , ". strtoupper($bill_of_lading->shipper_zip_code_id > 0 ? $bill_of_lading->shipper_zip_code->code : "") }} </p>
                    </td>
                    <td valign="top"  width="35%">
                            <p><strong>5. DOCUMENT NUMBER</strong><br>
                            {{ $bill_of_lading->shipment->booking_code }}</p>
                    </td>
                    <td valign="top"  width="15%">
                            <p><strong>5a. BL NUMBER</strong>
                            {{ $bill_of_lading->bl_number }} </p>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <table class="table header-table">
                            <tr><td><strong>6. EXPORT REFERENCES</strong></td></tr>
                            <tr><td>FILE# {{ ($bill_of_lading->shipment_id > 0 ? $bill_of_lading->shipment->code : "") }}</td></tr>
                        </table>
                    </td>
                    <td valign="top">
                            <p><strong>DATE</strong><br>
                            {{ $bill_of_lading->bl_date }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2" valign="top">
                            <p><strong>3. CONSIGNED TO</strong><br>
                            {{ strtoupper($bill_of_lading->consignee_id  >0 ? $bill_of_lading->consignee->name: "") }}<br>
                            {{ strtoupper($bill_of_lading->consignee_id  >0 ? $bill_of_lading->consignee->address: "") }}<br>
                            {{ strtoupper($bill_of_lading->consignee_state_id  >0 ? $bill_of_lading->consignee_state->name: "") }}<br></p>
                    </td>
                    <td colspan="2" valign="top">
                        <p><strong>7. FORWARDING AGENT (Name and Address - references)</strong><br>
                            {{ strtoupper($bill_of_lading->shipment->forwarding_agent_id >0 ? $bill_of_lading->shipment->forwarding_agent->name : "") }} <br>
                            {{ strtoupper($bill_of_lading->shipment->forwarding_agent_id >0 ? $bill_of_lading->shipment->forwarding_agent->address: "") }} <br>
                            {{ strtoupper($bill_of_lading->shipment->forwarding_agent_id >0 ? $bill_of_lading->shipment->forwarding_agent->phone : "") }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">
                            <p><strong>8. POINT STATE OF ORIGIN OR FTZ NUMBER</strong><br>
                            {{ strtoupper($bill_of_lading->point_of_origin) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top" >
                            <p><strong>4. NOTIFY PARTY/ INTERMEDIATE CONSIGNEE (Name and Address)</strong><br>
                                {{ strtoupper($bill_of_lading->notify_id >0 ? $bill_of_lading->notify->name : "" ) }}<br>
                                {{ strtoupper($bill_of_lading->notify_id >0 ? $bill_of_lading->notify->address : "" ) }}<br>
                                {{ strtoupper($bill_of_lading->notify_state_id >0 ? $bill_of_lading->notify_state->name : "" ) }}<br>
                                {{ "CONTACT: ".strtoupper($bill_of_lading->notify_contact)}} <br>
                                {{"  PHONE:". strtoupper($bill_of_lading->notify_contact_phone)  }}</p>

                    </td>
                    <td colspan="2" rowspan="2" valign="top">
                            <p><strong>9. DOMESTIC ROUTING/EXPORT INSTRUCTIONS</strong><br>
                            {{ strtoupper($bill_of_lading->shipment->domestic_routing) }}</p>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <table class="table header-table" >
                            <tr><td><strong>12. PRE CARRIAGE BY</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->pre_carriage_by) }}</td></tr>
                        </table>

                    </td>
                    <td valign="top">
                        <table class="table header-table">
                            <tr><td><strong>13. PLACE OF RECEIPT BY PRE-CARRIER</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipment->place_receipt->name) }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <table class="table header-table" >
                            <tr><td><strong>14. EXPORTING CARRIER</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->exporting_carrier) }}</td></tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table class="table header-table">
                            <tr><td><strong>13. PORT OF LOADING/EXPORT</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipment->port_loading->name) }}</td></tr>
                        </table>
                    </td>
                    <td colspan="2" valign="top">
                        <table class="table header-table">
                            <tr><td><strong>10. LOADING PIER/TERMINAL</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->loading_terminal) }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <table class="table header-table">
                            <tr><td><strong>16. FOREIGN PORT OF UNLOADING</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipment->port_unloading->name) }}</td></tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table class="table header-table">
                            <tr><td><strong>17. PLACE OF DELIVERY BY PRE-CARRIER</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipment->place_delivery->name) }}</td></tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table class="table header-table">
                            <tr><td><strong>11. TYPE OF MOVE</strong></td></tr>
                            <tr><td>OCEAN</td></tr>
                        </table>
                    </td>
                    <td valign="top">
                        <table class="table header-table">
                            <tr><td><strong>PREPAID/ COLLECTED</strong></td></tr>
                            <tr><td>{{ ($bill_of_lading->bl_type == "P"? "PREPAID" : "COLLECTED") }}</td></tr>
                        </table>
                    </td>
                </tr>

            </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-condensed">
                <thead>
                <tr>
                    <td width="20%"><strong>MARKS AND NUMBERS (18)</strong></td>
                    <td width="15%"><strong>NUMBER OF PACKAGES (19)</strong></td>
                    <td width="35%"><strong>DESCRIPTION OF COMMODITY (In Schedule B detail) (20)</strong></td>
                    <td width="15%"><strong>GROSS WEIGHT (Kgs) (21)</strong></td>
                    <td width="15%"><strong>MEASUREMENT (22)</strong></td>
                </tr>
                </thead>
                    <tbody>
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
                                <td></td>
                                <td></td>
                                <td>{{ $bill_of_lading->bl_notes }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td><strong>TOTALS: </strong></td>
                        <td><strong>{{ round($bill_of_lading->total_pieces) }}</strong></td>
                        <td></td>
                        <td><strong>{{ $bill_of_lading->total_weight_kgs}} Kgs</strong></td>
                        <td><strong>{{ $bill_of_lading->total_cubic_cbm }} Cbm</strong></td>
                    </tr>
                    <tr>
                        <td><strong></strong></td>
                        <td><strong></strong></td>
                        <td></td>
                        <td><strong>{{ $bill_of_lading->total_weight_lbs }} Lbs</strong></td>
                        <td><strong>{{ $bill_of_lading->total_cubic_cft }} Cft</strong></td>
                    </tr>
                    </tfoot>
            </table>
            </div>
        </div>


    <div class="row">
        <div class="col-xs-6">
            <div class="center">
                <table class="table header-table">
                    <tr><td  align="center"><strong>FREIGHT RATES, CHARGES, WEIGHT AND / OR MEASUREMENTS</strong></td></tr>
                </table>
            </div>
                <table class="table resume-table">
                    <thead>
                        <th><strong>SUBJECT TO CORRECTION</strong></th>
                        <th><strong>PREPAID</strong></th>
                        <th><strong>COLLECTED</strong></th>
                    </thead>
                    <tbody>
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
                    <td><p>DATED AT: </p></td>
                    <td><p>{{ $bill_of_lading->bl_date }}</p></td>
                    <td><p><strong>{{ ($bill_of_lading->bl_status == 'O' ?  "ORIGINAL" : ($bill_of_lading->bl_status == "E" ? "EXPRESS RELEASED" : "OBL RECEIVED_DATE")) }}</strong></p></td>
                </tr>
                <tr>
                    <td colspan="2"><p>SIGNED ON BEHALF OF CARRIER: </p></td>
                </tr>
                <tr>
                    <td ><p><strong>BY:  </strong></p> </td>
                    <td colspan="2"><p><strong> VECO LOGISTICS MIAMI </strong></p> </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><p><strong>BL. NO: </strong> {{ strtoupper($bill_of_lading->code) }}</p></td>
                </tr>
            </table>
        </div>

    </div>
</div>


</body>

</html>