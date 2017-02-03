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
            <div class="row">
                <div class="document-info pull-right">
                    <h5><strong>BILL OF LADING</strong></h5>
                    <p class="document_number">{{ $bill_of_lading->code }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table" border="1">
                <tr>
                    <td colspan="2" rowspan="2" width="50%">
                        <table class="table header-table">
                            <tr><td><strong>2. EXPORTER (Principal or seller-licensee and address including ZIP Code)</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipper_id > 0? $bill_of_lading->shipper->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipper_id > 0? $bill_of_lading->shipper_address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipper_id > 0? $bill_of_lading->shipper_city : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipper_state_id > 0? $bill_of_lading->shipper_state->code : "")}}   {{ ($bill_of_lading->shipper_zip_code_id > 0? $bill_of_lading->shipper_zip_code->code : "")  }} </td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->shipper_id > 0? $bill_of_lading->shipper_phone : "") }}</td></tr>
                        </table>
                    </td>
                    <td>
                        <table class="table header-table">
                            <tr><td><strong>5. DOCUMENT NUMBER</strong></td></tr>
                            <tr><td>{{ $bill_of_lading->code }}</td></tr>
                        </table>
                    </td>
                    <td>
                        <table class="table header-table">
                            <tr><td><strong>5a. B/L NUMBER</strong></td></tr>
                            <tr><td>{{ $bill_of_lading->mbl_number }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="table header-table">
                            <tr><td><strong>6. EXPORT REFERENCES</strong></td></tr>
                            <tr><td>{{ $bill_of_lading->shipment_code }}</td></tr>
                        </table>
                    </td>
                    <td>
                        <table class="table header-table">
                            <tr><td><strong>DATE</strong></td></tr>
                            <tr><td>{{ $bill_of_lading->date_today }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">
                        <table class="table header-table">
                            <tr><td><strong>3. CONSIGNED TO</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->consignee_id > 0? $bill_of_lading->consignee->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->consignee_id > 0? $bill_of_lading->consignee_address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->consignee_id > 0? $bill_of_lading->consignee_city : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->consignee_state_id > 0? $bill_of_lading->consignee_state->code : "")}}   {{ ($bill_of_lading->consignee_zip_code_id > 0? $bill_of_lading->consignee_zip_code->code : "")  }} </td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->consignee_id > 0? $bill_of_lading->consignee_phone : "") }}</td></tr>
                        </table>
                    </td>
                    <td colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>7. FORWARDING AGENT (Name and address - references)</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->forwarding_agent_id > 0? $bill_of_lading->forwarding_agent->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->forwarding_agent_id > 0? $bill_of_lading->forwarding_agent->address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->forwarding_agent_id > 0? $bill_of_lading->forwarding_agent->city : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->forwarding_agent_id > 0? $bill_of_lading->forwarding_agent->state->code : "")}}   {{ ($bill_of_lading->forwarding_agent_id > 0? $bill_of_lading->forwarding_agent->zip_code->code : "")  }} </td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->forwarding_agent_id > 0? $bill_of_lading->forwarding_agent->phone : "") }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>8. POINT (STATE) OF ORIGIN OR FTZ NUMBER</strong></td></tr>
                            <tr><td>{{ $bill_of_lading->shipment_code }}</td></tr>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>4. NOTIFY PARTY / INTERMEDIATE CONSIGNEE (Name and address)</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->notify_id > 0? $bill_of_lading->notify->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->notify_id > 0? $bill_of_lading->notify_address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->notify_id > 0? $bill_of_lading->notify_city : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->notify_state_id > 0? $bill_of_lading->notify_state->code : "")}}   {{ ($bill_of_lading->notify_zip_code_id > 0? $bill_of_lading->notify_zip_code->code : "")  }} </td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->notify_id > 0? $bill_of_lading->notify_phone : "") }}</td></tr>
                        </table>
                    </td>
                    <td colspan="2" rowspan="2">
                        <table class="table header-table">
                            <tr><td><strong>9. DOMESTIC ROUTING / EXPORT INSTRUCTION</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->forwarding_agent_id > 0? $bill_of_lading->forwarding_agent->name : "") }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td >
                        <table class="table header-table">
                            <tr><td><strong>12. PRE- CARRIAGE BY</strong></td></tr>
                            <tr><td>{{ $bill_of_lading->pre_carriage_by }}</td></tr>
                        </table>
                    </td>
                    <td >
                        <table class="table header-table">
                            <tr><td><strong>13. PLACE OF RECEIPT BY PRE-CARRIER</strong></td></tr>
                            <tr><td>{{ $bill_of_lading->place_receipt }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td >
                        <table class="table header-table">
                            <tr><td><strong>14. EXPORTING CARRIER</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->exporting_carrier) }}</td></tr>
                        </table>
                    </td>
                    <td >
                        <table class="table header-table">
                            <tr><td><strong>15. PORT OF LOADING / EXPORT</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->port_loading) }}</td></tr>
                        </table>
                    </td>
                    <td colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>10. LOADING PIER / TERMINAL</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->load_terminal) }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td >
                        <table class="table header-table">
                            <tr><td><strong>16. FOREIGN PORT OF UNLOADING</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->port_unloading) }}</td></tr>
                        </table>
                    </td>
                    <td >
                        <table class="table header-table">
                            <tr><td><strong>17. PLACE OF DELIVERY BY PRE-CARRIER</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->place_delivery) }}</td></tr>
                        </table>
                    </td>
                    <td>
                        <table class="table header-table">
                            <tr><td><strong>11. TYPE OF MOVE</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->load_terminal) }}</td></tr>
                        </table>
                    </td>
                    <td>
                        <table class="table header-table">
                            <tr><td><strong>PREPAID/COLLECT</strong></td></tr>
                            <tr><td>{{ ($bill_of_lading->bl_type == 'C' ? "COLLECTED" : "PREPAID") }}</td></tr>
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
                    <th>MARKS AND NUMBERS (18)</th>
                    <th>NUMBER OF PACKAGES (19)</th>
                    <th>DESCRIPTION OF COMMODITIES In Schedule B detail (20)</th>
                    <th>GROSS WEIGHT (21)</th>
                    <th>MEASURAMENT (22)</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($bill_of_lading->cargo as $detail)
                    <tr>
                        <td>{{ strtoupper($detail->marks) }}</td>
                        <td>{{ $detail->pieces }}</td>
                        <td>{{ strtoupper($detail->description) }}</td>
                        <td>{{ $detail->grossw }}</td>
                        <td>{{ $detail->cubic }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td><strong>TOTALS: </strong></p></td>
                    <td><strong>{{ round($bill_of_lading->total_pieces) }}</strong></td>
                    <td></td>
                    <td><strong>{{ $bill_of_lading->total_gross_weight }} Lbs</strong></td>
                    <td><strong>{{ $bill_of_lading->total_cubic }} Cf</strong></td>
                </tr>
                <tr>
                    <td><strong></strong></td>
                    <td><strong></strong></td>
                    <td></td>
                    <td><strong>{{ round($bill_of_lading->total_gross_weight * 0.453592, 3) }} Kgs</strong></td>
                    <td><strong>{{ round($bill_of_lading->total_cubic * 0.453592, 3) }} Cm</strong></td>
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
            <table class="table header-table">
                <thead>
                <tr>
                    <td><strong>SUBJECT TO CORRECTION</strong></td>
                    <td><strong>PREPAID</strong></td>
                    <td><strong>COLLECTED</strong></td>
                </tr>
                </thead>
                <tbody>
                @foreach($bill_of_lading->origin_charge as $detail)
                    <tr>
                        <td>{{ strtoupper($detail->billing_id > 0 ? $detail->billing->name : "") }}</td>
                        <td>{{ ($detail->bill_type == "P" ? $detail->billing_amount : "") }}</td>
                        <td>{{ ($detail->bill_type == "C" ? $detail->billing_amount : "") }}</td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <td><strong>GRAND TOTAL</strong></td>
                    <td><strong>{{ $bill_of_lading->sum_prepaid }}</strong></td>
                    <td><strong>{{ $bill_of_lading->sum_collected }}</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>


        <div class="col-xs-6">
            <table class="table header-table">
                <tr>
                    <td><p>DATED AT: </p></td>
                    <td><p>{{ $bill_of_lading->bl_date }}</p></td>
                    <td><p><strong>{{ ($bill_of_lading->bill_status == 'O' ?  "ORIGINAL" : ($bill_of_lading->bill_status == "E" ? "EXPRESS RELEASED" : "OBL RECEIVED_DATE")) }}</strong></p></td>
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
