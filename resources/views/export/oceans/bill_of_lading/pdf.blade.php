<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bill of Lading {{ $bill_of_lading->bl_code }}</title>
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
                    <p class="code-bar">{{ $bill_of_lading->bl_code }}</p>
                    <p class="document_number"><strong>BILL OF LADING # {{ $bill_of_lading->bl_code }}</strong></p>
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
                    <td colspan="2" valign="top">
                        <p><strong>2. EXPORTER (Principal or seller license and address including Zip Code)</strong>
                       {{ strtoupper($bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->name: "") }}</p>
                        <p>{{ strtoupper($bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->address: "") }}</p>
                        <p>{{strtoupper($bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->state->name: "")." , ".$bill_of_lading->carrier->zip_code->code }} </p>
                    </td>
                    <td valign="top">
                        <p><strong>5. DOCUMENT NUMBER</strong></p>
                        <p>{{ $bill_of_lading->document_number }}</p>
                    </td>
                    <td valign="top">
                        <p><strong>5a. BL NUMBER</strong> </p>
                        <p> {{ $bill_of_lading->bl_number }} </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">
                        <p><strong>3. CONSIGNED TO</strong></p>
                        <p>{{ strtoupper($bill_of_lading->consignee_id  >0 ? $bill_of_lading->consignee->name: "") }}</p>
                        <p>{{ strtoupper($bill_of_lading->consignee_id  >0 ? $bill_of_lading->consignee->address: "") }}</p>
                        <p>{{ strtoupper($bill_of_lading->consignee_state_id  >0 ? $bill_of_lading->consignee_state->name: "") }}</p>
                    </td>
                    <td valign="top">
                        <p><strong>7. FORWARDING AGENT (Name and Address - references)</strong></p>
                        <p> {{ strtoupper($bill_of_lading->forwarding_agent_id >0 ? $bill_of_lading->forwarding_agent->name : "") }} </p>
                        <p> {{ strtoupper($bill_of_lading->forwarding_agent_id >0 ? $bill_of_lading->forwarding_agent->address: "") }} </p>
                        <p> {{ strtoupper($bill_of_lading->forwarding_agent_id >0 ? $bill_of_lading->forwarding_agent->phone : "") }} </p>
                    </td>

                    <td valign="top">
                        <p><strong>8. POINT STATE OF ORIGIN OR FTZ NUMBER</strong></p>
                        <p> {{ strtoupper($bill_of_lading->point_of_origin) }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" valign="top">
                        <p><strong>4. NOTIFY PARTY/ INTERMEDIATE CONSIGNEE (Name and Address)</strong></p>
                        <p> {{ strtoupper($bill_of_lading->notify_id >0 ? $bill_of_lading->notify->name : "" ) }}</p>
                        <p> {{ strtoupper($bill_of_lading->notify_id >0 ? $bill_of_lading->notify->address : "" ) }}</p>
                        <p> {{ strtoupper($bill_of_lading->notify_state_id >0 ? $bill_of_lading->notify_state->name : "" ) }}</p>
                        <p> {{ "CONTACT: ".strtoupper($bill_of_lading->notify_contact)}} </p>
                        <p>{{"  PHONE:". strtoupper($bill_of_lading->notify_contact_phone)  }}</p>
                    </td>
                    <td colspan="3" valign="top" rowspan="2">
                        <p><strong>9. DOMESTIC ROUTING/EXPORT INSTRUCTIONS</strong></p>
                        <p>{{ strtoupper($bill_of_lading->domestic_instruction) }}</p>
                    </td>

                </tr>
                <tr>
                    <td valign="top">
                        <p><strong>12. PRE CARRIAGE BY</strong></p>
                        <p>{{ strtoupper($bill_of_lading->pre_carriage_by) }}</p>
                    </td>
                    <td valign="top">
                        <p><strong>13. PLACE OF RECEIPT BY PRE-CARRIER</strong></p>
                        <p>{{ strtoupper($bill_of_lading->place_receipt) }}</p>

                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <p><strong>14. EXPORTING CARRIER</strong></p>
                        <p>{{ strtoupper($bill_of_lading->exporting_carrier) }}</p>
                    </td>
                    <td valign="top">
                        <p><strong>13. PORT OF LOADING/EXPORT</strong></p>
                        <p>{{ strtoupper($bill_of_lading->port_loading) }}</p>

                    </td>
                    <td colspan="2" valign="top">
                        <p><strong>10. LOADING PIER/TERMINAL</strong></p>
                        <p>{{ strtoupper($bill_of_lading->loading_terminal) }}</p>
                    </td>

                </tr>
                <tr>
                    <td valign="top">
                        <p><strong>16. FOREIGN PORT OF UNLOADING</strong></p>
                        <p>{{ strtoupper($bill_of_lading->foreign_port) }}</p>
                    </td>
                    <td valign="top">
                        <p><strong>17. PLACE OF DELIVERY BY PRE-CARRIER</strong></p>
                        <p>{{ strtoupper($bill_of_lading->place_delivery) }}</p>

                    </td>
                    <td valign="top">
                        <p><strong>11. TYPE OF MOVE</strong></p>
                        <p>OCEAN</p>
                    </td>
                    <td valign="top">
                        <p><strong>PREPAID/ COLLECTED</strong></p>
                        <p>{{ ($bill_of_lading->bl_type == "P"? "PREPAID" : "COLLECTED") }}</p>
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
                    <td>18. MARKS AND NUMBERS</td>
                    <td>19. NUMBER OF PACKAGES</td>
                    <td>20. DESCRIPTION OF COMMODITY (In Schedule B detail)</td>
                    <td>21. GROSS WEIGHT (Kgs)</td>
                    <td>22. MEASUREMENT</td>

                </tr>
                </thead>
                    <tbody>

                           @foreach( $bill_of_lading->cargo as $detail)
                               <tr>
                                <td>{{ strtoupper($bill_of_lading->cargo_marks) }}</td>
                                <td>{{ $bill_of_lading->cargo_pieces }}</td>
                                <td>{{ strtoupper($bill_of_lading->cargo_description) }}</td>
                                <td>{{ ($bill_of_lading->cargo_weight_k >0 ? $bill_of_lading->cargo_weight_k : 0) }} Kgs</td>
                                <td>{{ ($bill_of_lading->cargo_cubic_k >0 ? $bill_of_lading->cargo_cubic_k  : 0) }} Cbn</td>
                               </tr>
                               <tr>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td>{{( $bill_of_lading->cargo_weight_l >0 ?  $bill_of_lading->cargo_weight_l : 0) }} Lbs</td>
                                   <td>{{ ($bill_of_lading->cargo_cubic_l > 0 ? $bill_of_lading->cargo_cubic_l : 0) }} Cft</td>
                               </tr>
                            @endforeach

                    </tbody>
            </table>
            </div>
        </div>

<div class="col-xs-12">
    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <table class="table resume-table" border="1">
                    <tr>
                        <td><p><strong>Subject to correction</strong></p></td>
                        <td><p><strong>PREPAID</strong></p></td>
                        <td><p><strong>COLLECTED</strong></p></td>
                    </tr>
                    <tr>
                        <td height="100px"><p><strong> </strong></p></td>
                        <td><p><strong></strong></p></td>
                        <td><p><strong></strong></p></td>
                    </tr>

                    <tr>
                        <td><p><strong>GRAND TOTAL</strong></p></td>
                    </tr>


                </table>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <table class="table resume-table">
                            <tr>
                                <td><p><strong>DATED AT: </strong></p></td>
                                <td><p>{{ $bill_of_lading->bl_date }}</p></td>
                                <td><p><strong>ORIGINAL</strong></p></td>
                            </tr>
                            <tr>
                                <td>
                                    <p><strong>SIGNED ON BEHALF OF CARRIER: </strong></p>
                                    <p><h5>BY: {{ strtoupper($bill_of_lading->carrier_id ? $bill_of_lading->carrier->name: "") }}</h5></p>
                                </td>
                            </tr>
                            <tr>
                                <td><p><strong>HBL- {{ $bill_of_lading->bl_code }}</strong></p></td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</body>

</html>